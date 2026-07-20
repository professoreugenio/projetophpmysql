<?php
require_once __DIR__ . '/componentes/config.php';
require_once __DIR__ . '/componentes/rotas.php';
require_once __DIR__ . '/componentes/conexao.php';

$con = config::connect(); 

// Limite usado para identificar produtos com estoque baixo.
$limiteEstoqueBaixo = 5;

// Valores padrão evitam avisos caso alguma consulta não retorne dados.
$totalProdutos = 0;
$produtosAtivos = 0;
$itensEmEstoque = 0;
$estoqueBaixo = 0;
$semEstoque = 0;
$entradasMes = 0;
$saidasMes = 0;
$valorTotalEstoque = 0.0;
$totalFornecedores = 0;
$fornecedoresAtivos = 0;
$totalClientes = 0;
$erroDashboard = null;

try {
    $con = Config::connect();

    /*
     * Consulta consolidada dos produtos.
     * GREATEST impede que estoque negativo diminua a quantidade e o valor total.
     */
    $sqlProdutos = "
        SELECT
            COUNT(*) AS total_produtos,
            COALESCE(SUM(
                CASE
                    WHEN LOWER(TRIM(status)) = 'ativo' THEN 1
                    ELSE 0
                END
            ), 0) AS produtos_ativos,
            COALESCE(SUM(
                CASE
                    WHEN LOWER(TRIM(status)) = 'ativo'
                    THEN GREATEST(estoque, 0)
                    ELSE 0
                END
            ), 0) AS itens_estoque,
            COALESCE(SUM(
                CASE
                    WHEN LOWER(TRIM(status)) = 'ativo'
                         AND estoque BETWEEN 1 AND :limite_estoque
                    THEN 1
                    ELSE 0
                END
            ), 0) AS estoque_baixo,
            COALESCE(SUM(
                CASE
                    WHEN LOWER(TRIM(status)) = 'ativo'
                         AND estoque <= 0
                    THEN 1
                    ELSE 0
                END
            ), 0) AS sem_estoque,
            COALESCE(SUM(
                CASE
                    WHEN LOWER(TRIM(status)) = 'ativo'
                    THEN preco * GREATEST(estoque, 0)
                    ELSE 0
                END
            ), 0) AS valor_total_estoque
        FROM produtos
    ";

    $stmtProdutos = $con->prepare($sqlProdutos);
    $stmtProdutos->bindValue(':limite_estoque', $limiteEstoqueBaixo, PDO::PARAM_INT);
    $stmtProdutos->execute();

    $dadosProdutos = $stmtProdutos->fetch(PDO::FETCH_ASSOC) ?: [];

    $totalProdutos = (int) ($dadosProdutos['total_produtos'] ?? 0);
    $produtosAtivos = (int) ($dadosProdutos['produtos_ativos'] ?? 0);
    $itensEmEstoque = (int) ($dadosProdutos['itens_estoque'] ?? 0);
    $estoqueBaixo = (int) ($dadosProdutos['estoque_baixo'] ?? 0);
    $semEstoque = (int) ($dadosProdutos['sem_estoque'] ?? 0);
    $valorTotalEstoque = (float) ($dadosProdutos['valor_total_estoque'] ?? 0);

    /*
     * Entradas e saídas do mês atual.
     * O filtro por intervalo permite melhor aproveitamento de índice em criado_em.
     */
    $sqlMovimentacoes = "
        SELECT
            COALESCE(SUM(
                CASE
                    WHEN LOWER(TRIM(tipo)) = 'entrada' THEN quantidade
                    ELSE 0
                END
            ), 0) AS entradas_mes,
            COALESCE(SUM(
                CASE
                    WHEN LOWER(TRIM(tipo)) IN ('saida', 'saída') THEN quantidade
                    ELSE 0
                END
            ), 0) AS saidas_mes
        FROM movimentacoes_estoque
        WHERE criado_em >= DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')
        AND criado_em < DATE_ADD(
            DATE_FORMAT(CURRENT_DATE, '%Y-%m-01'),
            INTERVAL 1 MONTH
        )
    ";

    $stmtMovimentacoes = $con->query($sqlMovimentacoes);
    $dadosMovimentacoes = $stmtMovimentacoes->fetch(PDO::FETCH_ASSOC) ?: [];

    $entradasMes = (int) ($dadosMovimentacoes['entradas_mes'] ?? 0);
    $saidasMes = (int) ($dadosMovimentacoes['saidas_mes'] ?? 0);

    // Totais das tabelas de clientes e fornecedores.
    $sqlCadastros = "
        SELECT
            (SELECT COUNT(*) FROM clientes) AS total_clientes,
            (SELECT COUNT(*) FROM fornecedores) AS total_fornecedores,
            (
                SELECT COUNT(*)
                FROM fornecedores
                WHERE LOWER(TRIM(status)) = 'ativo'
            ) AS fornecedores_ativos
    ";

    $stmtCadastros = $con->query($sqlCadastros);
    $dadosCadastros = $stmtCadastros->fetch(PDO::FETCH_ASSOC) ?: [];

    $totalClientes = (int) ($dadosCadastros['total_clientes'] ?? 0);
    $totalFornecedores = (int) ($dadosCadastros['total_fornecedores'] ?? 0);
    $fornecedoresAtivos = (int) ($dadosCadastros['fornecedores_ativos'] ?? 0);
} catch (Throwable $e) {
    error_log('[Dashboard de estoque] ' . $e->getMessage());
    $erroDashboard = 'Não foi possível carregar os indicadores do dashboard.';
}
?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Sistema de Controle de Estoque</title>
    <meta name="description" content="Dashboard administrativo moderno para controle e gestão de estoque.">
    <meta name="keywords" content="estoque, gestão, dashboard, admin, produtos">
    <meta name="author" content="Seu Nome">

    <!-- Compartilhamento em redes sociais -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:title" content="Dashboard - Sistema de Controle de Estoque">
    <meta property="og:description" content="Dashboard administrativo para controle de produtos, estoque, movimentações, clientes e fornecedores.">
    <meta property="og:image" content="https://cdn-icons-png.flaticon.com/512/2875/2875878.png">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Dashboard - Sistema de Controle de Estoque">
    <meta name="twitter:description" content="Acompanhe os principais indicadores do controle de estoque.">
    <meta name="twitter:image" content="https://cdn-icons-png.flaticon.com/512/2875/2875878.png">

    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2875/2875878.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <?php require_once APP_COMPONENTES . '/sibebar.php'; ?>

    <section class="dashboard-wrapper" id="mainWrapper">

        <?php require_once APP_COMPONENTES . '/header.php'; ?>

        <main class="p-4 flex-grow-1">

            <?php if ($erroDashboard !== null): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?= htmlspecialchars($erroDashboard, ENT_QUOTES, 'UTF-8'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            <?php endif; ?>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Dashboard de Estoque</h2>
                    <p class="text-muted mb-2">Bem-vindo de volta! Aqui está o resumo do seu estoque hoje.</p>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="#" class="text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>

                <div class="mt-3 mt-md-0 d-flex flex-wrap gap-2 align-items-center">
                    <span class="text-muted me-3 d-none d-lg-inline" id="currentDate">
                        <i class="bi bi-calendar3 me-1"></i>--/--/----
                    </span>

                    <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalNovoProduto">
                        <i class="bi bi-plus-lg me-1"></i> Novo Produto
                    </button>

                    <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEntrada">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Registrar Entrada
                    </button>

                    <button class="btn btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#modalSaida">
                        <i class="bi bi-box-arrow-left me-1"></i> Registrar Saída
                    </button>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Total de Produtos</p>
                                <h3 class="fw-bold mb-1">
                                    <?= number_format($totalProdutos, 0, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-box-seam"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-success small">
                            <i class="bi bi-check-circle me-1"></i>
                            <span><?= number_format($produtosAtivos, 0, ',', '.'); ?> ativos</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Itens em Estoque</p>
                                <h3 class="fw-bold mb-1">
                                    <?= number_format($itensEmEstoque, 0, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-success bg-opacity-10 text-success">
                                <i class="bi bi-layers"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-success small">
                            <i class="bi bi-boxes me-1"></i>
                            <span>Quantidade disponível</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4 border-start border-4 border-warning">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Estoque Baixo</p>
                                <h3 class="fw-bold mb-1">
                                    <?= number_format($estoqueBaixo, 0, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-warning bg-opacity-10 text-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-warning-emphasis small">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            <span>Entre 1 e <?= $limiteEstoqueBaixo; ?> unidades</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4 border-start border-4 border-danger">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Sem Estoque</p>
                                <h3 class="fw-bold mb-1">
                                    <?= number_format($semEstoque, 0, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-danger bg-opacity-10 text-danger">
                                <i class="bi bi-x-octagon"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-danger small">
                            <i class="bi bi-x-circle me-1"></i>
                            <span>Reposição necessária</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Entradas (Mês)</p>
                                <h3 class="fw-bold mb-1">
                                    <?= number_format($entradasMes, 0, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-info bg-opacity-10 text-info">
                                <i class="bi bi-box-arrow-in-right"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-success small">
                            <i class="bi bi-calendar-check me-1"></i>
                            <span>Unidades recebidas no mês</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Saídas (Mês)</p>
                                <h3 class="fw-bold mb-1">
                                    <?= number_format($saidasMes, 0, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-secondary bg-opacity-10 text-secondary">
                                <i class="bi bi-box-arrow-left"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-secondary small">
                            <i class="bi bi-calendar-check me-1"></i>
                            <span>Unidades retiradas no mês</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Valor Total</p>
                                <h3 class="fw-bold mb-1">
                                    R$ <?= number_format($valorTotalEstoque, 2, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-success bg-opacity-25 text-success">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-success small">
                            <i class="bi bi-calculator me-1"></i>
                            <span>Preço × quantidade em estoque</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Fornecedores</p>
                                <h3 class="fw-bold mb-1">
                                    <?= number_format($totalFornecedores, 0, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-dark bg-opacity-10 text-dark">
                                <i class="bi bi-truck"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-muted small">
                            <i class="bi bi-check-circle me-1"></i>
                            <span><?= number_format($fornecedoresAtivos, 0, ',', '.'); ?> ativos</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-hover h-100 p-3 rounded-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1 fs-6">Clientes</p>
                                <h3 class="fw-bold mb-1">
                                    <?= number_format($totalClientes, 0, ',', '.'); ?>
                                </h3>
                            </div>

                            <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-muted small">
                            <i class="bi bi-person-check me-1"></i>
                            <span>Clientes cadastrados</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php require_once APP_COMPONENTES . '/footer.php'; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/script.js"></script>
</body>
</html>

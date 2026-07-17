<?php require_once __DIR__ . '/componentes/config.php' ?>
<?php require_once __DIR__ . '/componentes/rotas.php' ?>
<?php require_once __DIR__ . '/componentes/conexao.php' ?>
<?php require_once 'query/query_produtos.php' ?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Controle de Estoque</title>
    <meta name="description" content="Dashboard administrativo moderno para controle e gestão de estoque.">
    <meta name="keywords" content="estoque, gestão, dashboard, admin, produtos">
    <meta name="author" content="Seu Nome">
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
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Produtos</h2>
                    <p class="text-muted mb-2">Lista de produtos</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="mt-3 mt-md-0 d-flex flex-wrap gap-2 align-items-center">
                    <span class="text-muted me-3 d-none d-lg-inline" id="currentDate"><i class="bi bi-calendar3 me-1"></i>--/--/----</span>
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
                <div class="col-12 ">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nr</th>
                                    <th>Produto</th>
                                    <th>Categoria</th>
                                    <th>Preço</th>
                                    <th>estoque</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($dados)): ?>
                                    <?php foreach ($dados as $indice => $produto): ?>
                                        <?php
                                        $encId = encrypt_secure($produto['id'], 'e');
                                        ?>
                                        <tr>
                                            <td><?= $indice + 1; ?></td>
                                            <td>
                                                <?= htmlspecialchars(
                                                    $produto['nome'],
                                                    ENT_QUOTES,
                                                    'UTF-8'
                                                ); ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars(
                                                    $produto['categoria'],
                                                    ENT_QUOTES,
                                                    'UTF-8'
                                                ); ?>
                                            </td>
                                            <td>
                                                R$ <?= number_format(
                                                        (float) $produto['preco'],
                                                        2,
                                                        ',',
                                                        '.'
                                                    ); ?>
                                            </td>
                                            <td>
                                                <?= (int) $produto['estoque']; ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <a
                                                    href="produto_editar.php?id=<?= urlencode($encId); ?>"
                                                    class="btn btn-warning btn-sm">
                                                    Editar
                                                </a>
                                                <a
                                                    href="?iddel=<?= urlencode($encId); ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Deseja realmente excluir este produto?');">
                                                    Excluir
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            Nenhum produto cadastrado.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
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
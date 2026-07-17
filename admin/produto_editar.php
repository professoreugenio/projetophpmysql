<?php require_once __DIR__ . '/componentes/config.php' ?>
<?php require_once __DIR__ . '/componentes/rotas.php' ?>
<?php require_once __DIR__ . '/componentes/conexao.php' ?>
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
                    <a href="produtos_cadastro.php" class="btn btn-primary shadow-sm">
                        <i class="bi bi-plus-lg me-1"></i> Novo Produto
                    </a>
                    <a href="estoque_entrada.php" class="btn btn-success shadow-sm">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Registrar Entrada
                    </a>
                    <a href="estoque_saida.php" class="btn btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#modalSaida">
                        <i class="bi bi-box-arrow-left me-1"></i> Registrar Saída
                    </a>
                </div>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-12 ">
                    <?php
                    $iddec = "0";
                    if (!empty($_GET['id'])) {
                        $iddec = encrypt_secure($_GET['id'], 'd');
                    }
                    $iddec = filter_var($iddec, FILTER_VALIDATE_INT);
                    if ($iddec === false || $iddec <= 0) {
                        exit('ID do produto inválido.');
                    }
                    $con = Config::connect();
                    $sql = "SELECT id, nome, categoria, preco, estoque, status, criado_em
                    FROM produtos WHERE id =:id
                    ORDER BY nome DESC";
                    $stmt = $con->prepare($sql);
                    $stmt->bindValue(':id', $iddec, PDO::PARAM_INT);
                    $stmt->execute();
                    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="card-body p-4">
                        <form
                            action="produto_atualizar.php"
                            method="POST"
                            autocomplete="off">
                            <!--
                                        O formulário mantém o ID criptografado.
                                        A página de atualização deverá descriptografá-lo.
                                    -->
                            <input
                                type="hidden"
                                name="id"
                                value="<?= htmlspecialchars(
                                            $idCriptografado,
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ); ?>">
                            <div class="row g-3">
                                <!-- Nome -->
                                <div class="col-12 col-md-8">
                                    <label
                                        for="nome"
                                        class="form-label fw-medium">
                                        Nome do produto
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-box-seam"></i>
                                        </span>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="nome"
                                            name="nome"
                                            maxlength="120"
                                            placeholder="Digite o nome do produto"
                                            value="<?= htmlspecialchars(
                                                        $produto['nome'],
                                                        ENT_QUOTES,
                                                        'UTF-8'
                                                    ); ?>"
                                            required
                                            autofocus>
                                    </div>
                                </div>
                                <!-- Categoria -->
                                <div class="col-12 col-md-4">
                                    <label
                                        for="categoria"
                                        class="form-label fw-medium">
                                        Categoria
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-tags"></i>
                                        </span>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="categoria"
                                            name="categoria"
                                            maxlength="80"
                                            placeholder="Categoria"
                                            value="<?= htmlspecialchars(
                                                        $produto['categoria'],
                                                        ENT_QUOTES,
                                                        'UTF-8'
                                                    ); ?>"
                                            required>
                                    </div>
                                </div>
                                <!-- Preço -->
                                <div class="col-12 col-md-4">
                                    <label
                                        for="preco"
                                        class="form-label fw-medium">
                                        Preço
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            R$
                                        </span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="preco"
                                            name="preco"
                                            min="0"
                                            step="0.01"
                                            placeholder="0,00"
                                            value="<?= htmlspecialchars(
                                                        $produto['preco'],
                                                        ENT_QUOTES,
                                                        'UTF-8'
                                                    ); ?>"
                                            required>
                                    </div>
                                    <div class="form-text">
                                        Utilize valores positivos.
                                    </div>
                                </div>
                                <!-- Estoque -->
                                <div class="col-12 col-md-4">
                                    <label
                                        for="estoque"
                                        class="form-label fw-medium">
                                        Quantidade em estoque
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-boxes"></i>
                                        </span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="estoque"
                                            name="estoque"
                                            min="0"
                                            step="1"
                                            placeholder="0"
                                            value="<?= (int) $produto['estoque']; ?>"
                                            required>
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="col-12 col-md-4">
                                    <label
                                        for="status"
                                        class="form-label fw-medium">
                                        Status
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select
                                        class="form-select"
                                        id="status"
                                        name="status"
                                        required>
                                        <option
                                            value="ativo"
                                            <?= $produto['status'] === 'ativo'
                                                ? 'selected'
                                                : ''; ?>>
                                            Ativo
                                        </option>
                                        <option
                                            value="inativo"
                                            <?= $produto['status'] === 'inativo'
                                                ? 'selected'
                                                : ''; ?>>
                                            Inativo
                                        </option>
                                    </select>
                                </div>
                                <!-- Data de criação -->
                                <div class="col-12 col-md-6">
                                    <label
                                        for="criado_em"
                                        class="form-label fw-medium">
                                        Data de cadastro
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-calendar-check"></i>
                                        </span>
                                        <input
                                            type="text"
                                            class="form-control bg-body-tertiary"
                                            id="criado_em"
                                            value="<?= htmlspecialchars(
                                                        date(
                                                            'd/m/Y H:i',
                                                            strtotime(
                                                                $produto['criado_em']
                                                            )
                                                        ),
                                                        ENT_QUOTES,
                                                        'UTF-8'
                                                    ); ?>"
                                            readonly>
                                    </div>
                                    <div class="form-text">
                                        A data de cadastro não será alterada.
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Botões -->
                            <div
                                class="d-flex flex-column flex-sm-row justify-content-end gap-2">
                                <a
                                    href="produtos.php"
                                    class="btn btn-outline-secondary">
                                    <i class="bi bi-x-lg me-1"></i>
                                    Cancelar
                                </a>
                                <button
                                    type="reset"
                                    class="btn btn-outline-warning">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i>
                                    Restaurar
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i>
                                    Salvar alterações
                                </button>
                            </div>
                        </form>
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
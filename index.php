<?php require_once __DIR__ . '/componentes/rotas.php' ?>
<!doctype html>
<html lang="pt-br" data-bs-theme="light">

<head>
    <title>Controle de Estoque</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="componentes/styles.css">
</head>

<body>

    <!-- ========== NAVBAR ========== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom d-flex align-items-center gap-2" href="index.html">
                <i class="bi bi-box-seam fs-4"></i>
                <span>Controle de Estoque</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-box me-1"></i> Produtos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark-custom">
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-list-ul me-2"></i>Listar Produtos</a></li>
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-plus-circle me-2"></i>Cadastrar Produto</a></li>
                            <li>
                                <hr class="dropdown-divider dropdown-divider-custom">
                            </li>
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-tags me-2"></i>Categorias</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-people me-1"></i> Clientes
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark-custom">
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-list-ul me-2"></i>Listar Clientes</a></li>
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-person-plus me-2"></i>Cadastrar Cliente</a></li>
                            <li>
                                <hr class="dropdown-divider dropdown-divider-custom">
                            </li>
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-clock-history me-2"></i>Histórico</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-graph-up me-1"></i> Relatórios
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark-custom">
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-box-seam me-2"></i>Estoque Atual</a></li>
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-exclamation-triangle me-2"></i>Em Falta</a></li>
                            <li><a class="dropdown-item dropdown-item-custom" href="#"><i class="bi bi-arrow-left-right me-2"></i>Movimentações</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="aulas/aula01_variaveis/" class="nav-link nav-link-custom">
                            <i class="bi bi-mortarboard me-1"></i> Aulas
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-pill px-3">
                            <i class="bi bi-box-arrow-right me-1"></i> Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ========== HEADER HERO ========== -->
    <header class="header-hero">
        <div class="header-bg-pattern"></div>
        <div class="header-glow header-glow-1"></div>
        <div class="header-glow header-glow-2"></div>

        <div class="container position-relative z-1">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7 text-center">

                    <div class="mb-4">
                        <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 rounded-pill px-3 py-2 fw-semibold">
                            <span class="d-inline-block bg-success rounded-circle me-2" style="width: 8px; height: 8px;"></span>
                            Sistema Online
                        </span>
                    </div>

                    <h1 class="display-4 fw-bold text-white mb-3 lh-sm">
                        Sistema de <span class="text-gradient">Controle de Estoque</span>
                    </h1>

                    <p class="lead text-white-50 mb-4 mx-auto" style="max-width: 600px;">
                        Gerencie produtos, clientes e relatórios de forma simples, organizada e eficiente.
                    </p>

                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
                        <a href="#" class="btn btn-primary btn-lg rounded-pill px-4 fw-semibold shadow">
                            <i class="bi bi-plus-lg me-2"></i>Novo Produto
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-semibold">
                            <i class="bi bi-bar-chart-line me-2"></i>Ver Relatórios
                        </a>
                    </div>

                    <div class="row g-3 justify-content-center">
                        <div class="col-6 col-md-3">
                            <div class="card stat-card border-0 rounded-4">
                                <div class="card-body py-3">
                                    <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
                                        <i class="bi bi-box-seam text-info fs-5"></i>
                                        <span class="fw-bold fs-4 text-white">1.247</span>
                                    </div>
                                    <small class="text-white-50">Produtos</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card stat-card border-0 rounded-4">
                                <div class="card-body py-3">
                                    <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
                                        <i class="bi bi-people text-warning fs-5"></i>
                                        <span class="fw-bold fs-4 text-white">342</span>
                                    </div>
                                    <small class="text-white-50">Clientes</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card stat-card border-0 rounded-4">
                                <div class="card-body py-3">
                                    <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
                                        <i class="bi bi-exclamation-circle text-danger fs-5"></i>
                                        <span class="fw-bold fs-4 text-white">18</span>
                                    </div>
                                    <small class="text-white-50">Em Falta</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card stat-card border-0 rounded-4">
                                <div class="card-body py-3">
                                    <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
                                        <i class="bi bi-currency-dollar text-success fs-5"></i>
                                        <span class="fw-bold fs-4 text-white">R$ 45K</span>
                                    </div>
                                    <small class="text-white-50">Valor Total</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-wave">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 52.5C480 45 600 60 720 67.5C840 75 960 75 1080 67.5C1200 60 1320 45 1380 37.5L1440 30V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#f1f5f9" />
            </svg>
        </div>
    </header>

    <!-- ========== CARDS DE AÇÃO ========== -->
    <section class="container my-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card action-card h-100">
                    <div class="card-body text-center">
                        <div class="action-icon icon-produtos mx-auto">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Produtos</h3>
                        <p class="text-secondary mb-4">
                            Cadastre, edite e organize os produtos disponíveis no estoque com facilidade.
                        </p>
                        <a href="#" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-arrow-right me-1"></i> Acessar Produtos
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card action-card h-100">
                    <div class="card-body text-center">
                        <div class="action-icon icon-clientes mx-auto">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Clientes</h3>
                        <p class="text-secondary mb-4">
                            Consulte e cadastre clientes relacionados às movimentações do estoque.
                        </p>
                        <a href="#" class="btn btn-success rounded-pill px-4">
                            <i class="bi bi-arrow-right me-1"></i> Acessar Clientes
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card action-card h-100">
                    <div class="card-body text-center">
                        <div class="action-icon icon-relatorios mx-auto">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Relatórios</h3>
                        <p class="text-secondary mb-4">
                            Acompanhe o estoque atual, produtos em falta e movimentações detalhadas.
                        </p>
                        <a href="#" class="btn btn-warning rounded-pill px-4 text-dark">
                            <i class="bi bi-arrow-right me-1"></i> Ver Relatórios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== LISTA DE ALUNOS ========== -->
    <section class="container mb-5">
        <div class="card alunos-card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-mortarboard fs-5"></i>
                    <h4 class="mb-0 fw-semibold">Lista de Alunos</h4>
                </div>
                <span class="badge bg-white bg-opacity-10 text-white rounded-pill px-3">8 alunos</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-alunos">
                        <thead>
                            <tr>
                                <th class="ps-4">Nº</th>
                                <th>Nome do Aluno</th>
                                <th class="text-end pe-4">Acessar Projeto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4"><span class="numero-badge">1</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="aluno-avatar">AB</span>
                                        <span class="fw-medium">Arley Barros</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="http://10.0.30.159/projeto-php-mysql/" target="_blank" class="btn btn-acessar btn-sm text-white text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Acessar
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4"><span class="numero-badge">2</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="aluno-avatar">AJ</span>
                                        <span class="fw-medium">Aurinon Junior</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="http://10.0.30.146/projetophpmysql/" target="_blank" class="btn btn-acessar btn-sm text-white text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Acessar
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4"><span class="numero-badge">3</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="aluno-avatar">LE</span>
                                        <span class="fw-medium">Leo</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="http://10.0.30.144/projetophpmysql/" target="_blank" class="btn btn-acessar btn-sm text-white text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Acessar
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4"><span class="numero-badge">4</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="aluno-avatar">LU</span>
                                        <span class="fw-medium">Luan</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="http://10.0.30.126/projetophpmysql/" target="_blank" class="btn btn-acessar btn-sm text-white text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Acessar
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4"><span class="numero-badge">5</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="aluno-avatar">FJ</span>
                                        <span class="fw-medium">Francisco José</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="http://10.0.30.239/projetophpmysql/" target="_blank" class="btn btn-acessar btn-sm text-white text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Acessar
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4"><span class="numero-badge">6</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="aluno-avatar">WI</span>
                                        <span class="fw-medium">Will</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="http://10.0.30.131/projetophpmysql/" target="_blank" class="btn btn-acessar btn-sm text-white text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Acessar
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4"><span class="numero-badge">7</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="aluno-avatar">ED</span>
                                        <span class="fw-medium">Ednilson</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="http://10.0.30.116/projetophpmysql/" target="_blank" class="btn btn-acessar btn-sm text-white text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Acessar
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4"><span class="numero-badge">8</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="aluno-avatar">CR</span>
                                        <span class="fw-medium">Carlos Ricardo</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="http://10.0.30.107/projetophpmysql/" target="_blank" class="btn btn-acessar btn-sm text-white text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Acessar
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== PAINEL INICIAL ========== -->
    <main class="container mb-5">
        <div class="painel-card p-4 p-md-5">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="bi bi-speedometer2 fs-3"></i>
                </div>
                <div>
                    <h2 class="h4 fw-bold mb-0">Painel Inicial</h2>
                    <p class="text-secondary mb-0 small">Visão geral do sistema</p>
                </div>
            </div>

            <p class="text-secondary mb-4">
                Esta página é a estrutura inicial do projeto <strong>Controle de Estoque</strong>.
                A partir dela, você poderá criar páginas para cadastro de produtos, clientes,
                fornecedores, categorias e relatórios.
            </p>

            <div class="alert alert-dica d-flex align-items-start gap-3 mb-0">
                <i class="bi bi-lightbulb fs-4 text-primary flex-shrink-0 mt-1"></i>
                <div>
                    <strong class="d-block mb-1">Dica de organização</strong>
                    Mantenha os arquivos do projeto organizados em pastas, como
                    <code class="bg-white px-1 rounded">css</code>,
                    <code class="bg-white px-1 rounded">js</code>,
                    <code class="bg-white px-1 rounded">img</code> e
                    <code class="bg-white px-1 rounded">pages</code>.
                </div>
            </div>
        </div>
    </main>

    <!-- ========== FOOTER ========== -->
    <footer class="footer-main">
        <div class="footer-top-line"></div>
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4 text-lg-start text-center">
                        <a href="index.html" class="d-inline-flex align-items-center gap-2 text-decoration-none">
                            <i class="bi bi-box-seam text-primary fs-4"></i>
                            <span class="fw-bold fs-5 text-white">Controle de Estoque</span>
                        </a>
                        <p class="text-secondary mt-2 mb-0 small">
                            Simplificando a gestão do seu negócio.
                        </p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="#" class="footer-link">Produtos</a>
                            <a href="#" class="footer-link">Clientes</a>
                            <a href="#" class="footer-link">Relatórios</a>
                            <a href="#" class="footer-link">Suporte</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end text-center">
                        <div class="d-flex justify-content-lg-end justify-content-center gap-2 mb-2">
                            <a href="#" class="social-btn" aria-label="GitHub"><i class="bi bi-github"></i></a>
                            <a href="#" class="social-btn" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="social-btn" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <span class="badge bg-dark border border-secondary text-secondary small">v1.0.0</span>
                    </div>
                </div>
                <hr class="footer-divider my-4">
                <div class="row align-items-center">
                    <div class="col-md-6 text-md-start text-center">
                        <p class="mb-0 text-secondary small">
                            &copy; 2026 <strong class="text-white-50">Controle de Estoque</strong>. Todos os direitos reservados.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end text-center mt-2 mt-md-0">
                        <p class="mb-0 text-secondary small">
                            Desenvolvido com <i class="bi bi-heart-fill text-danger small"></i> por <a href="#" class="text-decoration-none text-white-50">Sua Empresa</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
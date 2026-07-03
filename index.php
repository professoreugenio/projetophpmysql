<?php require_once __DIR__ . '/componentes/config.php' ?>
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
   <?php require_once APP_COMPONENTES.'/nav.php';?>
   
   <!-- ========== HEADER HERO ========== -->
   <?php require_once APP_COMPONENTES.'/header.php';?>
    

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
   
       <?php require_once APP_COMPONENTES.'/footer.php';?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
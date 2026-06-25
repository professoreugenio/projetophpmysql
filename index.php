<!doctype html>
<html lang="pt-br" data-bs-theme="light">

<head>
    <title>Controle de Estoque</title>

    <!-- Meta tags obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        header {
            background: linear-gradient(135deg, #212529, #495057);
            color: #ffffff;
            padding: 60px 0;
        }

        footer {
            background-color: #212529;
            color: #ffffff;
            padding: 20px 0;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <!-- Nome do projeto à esquerda -->
            <a class="navbar-brand fw-bold" href="index.html">
                Controle de Estoque
            </a>

            <!-- Botão do menu mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal"
                aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links à direita -->
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <!-- Dropdown Produtos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="produtosDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="produtosDropdown">
                            <li><a class="dropdown-item" href="#">Listar Produtos</a></li>
                            <li><a class="dropdown-item" href="#">Cadastrar Produto</a></li>
                            <li><a class="dropdown-item" href="#">Categorias</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Clientes -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="clientesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Clientes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="clientesDropdown">
                            <li><a class="dropdown-item" href="#">Listar Clientes</a></li>
                            <li><a class="dropdown-item" href="#">Cadastrar Cliente</a></li>
                            <li><a class="dropdown-item" href="#">Histórico de Compras</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Relatórios -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="relatoriosDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Relatórios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="relatoriosDropdown">
                            <li><a class="dropdown-item" href="#">Estoque Atual</a></li>
                            <li><a class="dropdown-item" href="#">Produtos em Falta</a></li>
                            <li><a class="dropdown-item" href="#">Movimentações</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="aulas/aula01_variaveis/" class="nav-link" >
                            Aulas
                        </a>
                        
                    </li>
                    


                </ul>
            </div>
        </div>
    </nav>

    <!-- HEADER -->
    <header>
        <div class="container text-center">
            <h1 class="display-5 fw-bold">Sistema de Controle de Estoque</h1>
            <p class="lead">
                Gerencie produtos, clientes e relatórios de forma simples e organizada.
            </p>
            <a href="#" class="btn btn-light btn-lg mt-3">Começar Agora</a>
        </div>
    </header>

    <!-- SECTION -->
    <section class="container my-5">
        <div class="row text-center">

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5 card-title">Produtos</h2>
                        <p class="card-text">
                            Cadastre, edite e organize os produtos disponíveis no estoque.
                        </p>
                        <a href="#" class="btn btn-primary">Acessar Produtos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5 card-title">Clientes</h2>
                        <p class="card-text">
                            Consulte e cadastre clientes relacionados às movimentações.
                        </p>
                        <a href="#" class="btn btn-primary">Acessar Clientes</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5 card-title">Relatórios</h2>
                        <p class="card-text">
                            Acompanhe o estoque atual, produtos em falta e movimentações.
                        </p>
                        <a href="#" class="btn btn-primary">Ver Relatórios</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- MAIN -->
    <main class="container my-5">
        <div class="bg-white p-4 rounded shadow-sm">
            <h2 class="mb-3">Painel Inicial</h2>
            <p>
                Esta página é a estrutura inicial do projeto <strong>Controle de Estoque</strong>.
                A partir dela, você poderá criar páginas para cadastro de produtos, clientes,
                fornecedores, categorias e relatórios.
            </p>

            <div class="alert alert-info">
                Dica: mantenha os arquivos do projeto organizados em pastas, como
                <strong>css</strong>, <strong>js</strong>, <strong>img</strong> e <strong>pages</strong>.
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-0">
                &copy; 2026 - Controle de Estoque. Todos os direitos reservados.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JavaScript via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

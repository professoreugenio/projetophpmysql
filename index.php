<?php require_once __DIR__. '/componentes/rotas.php'?>
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
   <?php require_once APP_COMPONENTES.'/nav.php'; ?>

    <!-- HEADER -->
    <?php require_once APP_COMPONENTES.'/header.php'; ?>

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
   <?php require_once APP_COMPONENTES.'/footer.php'; ?>

    <!-- Bootstrap JavaScript via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

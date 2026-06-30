<?php require_once dirname(__DIR__) . '/componentes/rotas.php'; ?>
<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS v5.3.8 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body>
    <?php $numaula = "Aula 4"; ?>
    <?php require_once APP_COMPONENTES . '/nav.php'; ?>
    <?php require_once APP_COMPONENTES . '/header.php'; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Condicional if</h3>
                    <h4>1.Igualdade</h4>

                    <?php
                    $valor = 50;
                    ?>
                    <p>
                        <?php

                        if ($valor == 100) {
                            echo "Valor " . $valor . " é igual a 100";
                        } else {
                            echo "Valor " . $valor . " não é igual a 100";
                        }


                        ?>

                    </p>

                    <h4>2.Intervalo</h4>

                    <p>
                        <?php
                        if ($valor > 100) {
                            echo "Valor " . $valor . " é maio do que 100";
                        } else {

                            echo "Valor " . $valor . " não é maio do que 100";
                        }


                        ?>
                    </p>

                    <h4>Recebendo valores de links</h4>
                    Clique no link para ativar ou desativar uma ação.
                    <br>
                    <br>
                    <a href="?acao=1" class="btn btn-success btn-sm">
                        Ativar ação
                    </a>
                    <a href="?acao=2" class="btn btn-warning btn-sm">
                        Desativar ação
                    </a>

                    <a href="?acao= " class="btn btn-default btn-sm">
                        Resetar
                    </a>
                    <br>
                    <?php

                    if (!empty($_GET['acao'])) {

                        if ($_GET['acao'] == 1) {

                            echo '<div class="mt-2 alert alert-success" role="alert">
    Serviço ativado com sucesso!
</div>
';
                        } else {

                            echo '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
    serviço desativado.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
';
                        }
                    }

                    ?>

                    <h4>if e else if</h4>

                    <?php

                    


                    ?>


                </div>
            </div>
        </div>
    </main>

    <?php require_once APP_COMPONENTES . '/footer.php'; ?>

    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
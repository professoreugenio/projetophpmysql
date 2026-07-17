<?php
try {
    $con = Config::connect();

    $sql = "SELECT
                id,
                nome,
                categoria,
                preco,
                estoque,
                status
            FROM produtos
            ORDER BY nome ASC";

    $stmt = $con->query($sql);

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log('Erro ao consultar produtos: ' . $e->getMessage());

    $mensagemErro = 'Não foi possível carregar os produtos.';
}
?>

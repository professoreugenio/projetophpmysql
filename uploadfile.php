<?php
// Inclui o seu arquivo de conexão
require_once 'componentes/conexao.php';

$mensagem = '';
$tipo_alerta = '';

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagem'])) {
    
    try {
        // Inicia a conexão utilizando a sua classe/método
        $con = config::connect();
        
        $nome_foto_input = trim($_POST['nome_foto']);
        $imagem = $_FILES['imagem'];
        $pasta_destino = 'fotos/';
        
        // Verifica se a pasta existe, senão cria
        if (!is_dir($pasta_destino)) {
            mkdir($pasta_destino, 0755, true);
        }

        // Validação de erro no upload
        if ($imagem['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erro ao fazer o upload da imagem.");
        }

        // Validação do tipo de arquivo (Apenas JPG/JPEG e PNG)
        $tipos_permitidos = ['image/jpeg', 'image/jpg', 'image/png'];
        $tipo_arquivo = mime_content_type($imagem['tmp_name']);
        
        if (!in_array($tipo_arquivo, $tipos_permitidos)) {
            throw new Exception("Formato inválido. Envie apenas JPG ou PNG.");
        }

        // Obter dimensões originais
        list($largura_orig, $altura_orig) = getimagesize($imagem['tmp_name']);
        
        // Redimensionamento proporcional (Max 1024px)
        $max_dim = 1024;
        if ($largura_orig > $max_dim || $altura_orig > $max_dim) {
            $proporcao = $largura_orig / $altura_orig;
            if ($proporcao > 1) {
                $nova_largura = $max_dim;
                $nova_altura = $max_dim / $proporcao;
            } else {
                $nova_altura = $max_dim;
                $nova_largura = $max_dim * $proporcao;
            }
        } else {
            $nova_largura = $largura_orig;
            $nova_altura = $altura_orig;
        }

        // Cria a imagem na memória dependendo do formato original
        if ($tipo_arquivo == 'image/png') {
            $img_original = imagecreatefrompng($imagem['tmp_name']);
        } else {
            $img_original = imagecreatefromjpeg($imagem['tmp_name']);
        }

        // Cria uma nova imagem true color com as novas dimensões
        $img_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);

        // Mantém a transparência para PNG
        imagealphablending($img_redimensionada, false);
        imagesavealpha($img_redimensionada, true);
        $cor_transparente = imagecolorallocatealpha($img_redimensionada, 255, 255, 255, 127);
        imagefilledrectangle($img_redimensionada, 0, 0, $nova_largura, $nova_altura, $cor_transparente);

        // Copia e redimensiona
        imagecopyresampled($img_redimensionada, $img_original, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_orig, $altura_orig);

        // Lógica para salvar em WEBP com limite de tamanho (Máx 120kb)
        $nome_arquivo_final = uniqid() . '.webp';
        $caminho_final = $pasta_destino . $nome_arquivo_final;
        $qualidade = 100;
        $tamanho_kb = 0;

        // Loop para comprimir até ficar abaixo de 120kb (ou atingir qualidade mínima)
        do {
            ob_start();
            imagewebp($img_redimensionada, null, $qualidade);
            $dados_imagem = ob_get_contents();
            ob_end_clean();
            
            $tamanho_kb = strlen($dados_imagem) / 1024;
            $qualidade -= 5;
        } while ($tamanho_kb > 120 && $qualidade > 10);

        // Salva o arquivo final na pasta
        file_put_contents($caminho_final, $dados_imagem);

        // Libera memória
        imagedestroy($img_original);
        imagedestroy($img_redimensionada);

        // Preparar dados para o banco
        $extensao = 'webp';
        $status = 1; // 1 = Ativo
        $hora_registro = date('H:i:s');
        
        // Inserir no banco de dados utilizando sua conexão ($con)
        $sql = "INSERT INTO fotos_sistema (nome_foto, pasta, extensao, status, hora_registro) 
                VALUES (:nome_foto, :pasta, :extensao, :status, :hora_registro)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nome_foto', $nome_foto_input);
        $stmt->bindParam(':pasta', $pasta_destino);
        $stmt->bindParam(':extensao', $extensao);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':hora_registro', $hora_registro);
        
        if ($stmt->execute()) {
            $mensagem = "Imagem enviada, redimensionada e salva com sucesso!";
            $tipo_alerta = "success";
        }

    } catch (Exception $e) {
        $mensagem = $e->getMessage();
        $tipo_alerta = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Cadastrar Nova Foto</h4>
                </div>
                <div class="card-body">
                    
                    <?php if ($mensagem): ?>
                        <div class="alert alert-<?= $tipo_alerta ?> alert-dismissible fade show" role="alert">
                            <?= $mensagem ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Formulário -->
                    <form action="" method="POST" enctype="multipart/form-data" id="formUpload">
                        
                        <div class="mb-3">
                            <label for="nome_foto" class="form-label">Nome da Imagem</label>
                            <input type="text" class="form-control" id="nome_foto" name="nome_foto" maxlength="50" required placeholder="Digite o nome da imagem">
                        </div>

                        <div class="mb-3">
                            <label for="imagem" class="form-label">Selecione a Imagem (JPG ou PNG)</label>
                            <input class="form-control" type="file" id="imagem" name="imagem" accept=".jpg, .jpeg, .png" required>
                            <div class="form-text">A imagem será convertida para WebP e redimensionada para no máximo 1024px.</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Enviar e Processar Imagem</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Validação via JavaScript -->
<script>
document.getElementById('formUpload').addEventListener('submit', function(e) {
    var fileInput = document.getElementById('imagem');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    
    if (!allowedExtensions.exec(filePath)) {
        alert('Por favor, envie apenas arquivos JPG ou PNG.');
        fileInput.value = '';
        e.preventDefault();
        return false;
    }
});
</script>

</body>
</html>
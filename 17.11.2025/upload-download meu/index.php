<?php
// Define o diretório onde os arquivos serão armazenados
$diretorioDestino = __DIR__ . '/uploads/';

// Cria o diretório se não existir
if (!file_exists($diretorioDestino)) {
    mkdir($diretorioDestino, 0777, true);
}

// --- UPLOAD DE ARQUIVO ---
$mensagem = null;
$mensagem_tipo = null; // 'success' ou 'error'

if (isset($_FILES['arquivo'])) {   
    //Carrega na memória o arquivo "postado"
    $arquivo = $_FILES['arquivo'];

    //Move o arquivo que está carregado na memória com um nome temporário, para
    //O novo diretório com o nome especificado anteriormente
    if (move_uploaded_file($arquivo['tmp_name'], $diretorioDestino . $arquivo['name'])) {
        $mensagem = 'Arquivo enviado com sucesso!';
        $mensagem_tipo = 'success';
    } else {
        $mensagem = 'Erro ao enviar o arquivo.';
        $mensagem_tipo = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Upload e Download de Arquivos</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <h1>Upload de Arquivos</h1>
        <p class="subtitle">Envie seus arquivos para armazenar e baixar quando precisar.</p>

        <form action="" method="post" enctype="multipart/form-data">
            <label>Selecione um arquivo para enviar:</label>
            <input type="file" name="arquivo" required>
            <button type="submit">Enviar</button>
        </form>

        <div class="downloads-title">Arquivos disponíveis para download</div>
        <div class="downloads-list">
            <?php
            $arquivos_escaneados = scandir("uploads");
            foreach ($arquivos_escaneados as $arquivos) :
                // Ignora entradas especiais e alguns tipos de arquivos binários
                $extensao = strtolower(pathinfo($arquivos, PATHINFO_EXTENSION));
                $extensoes_bloqueadas = ["dll", "exe", "bat", "com", "msi", "bin"]; // ajuste se quiser
                $extensoes_imagens = ["png", "jpg", "jpeg", "gif", "webp"];

                if ($arquivos != "." && $arquivos != ".." && !in_array($extensao, $extensoes_bloqueadas)):
                    // Se for imagem, mostra a imagem clicável que faz download
                    if (in_array($extensao, $extensoes_imagens)) :
            ?>
                        <a href="uploads/<?= $arquivos ?>" download>
                            <img src="uploads/<?= $arquivos ?>" alt="<?= $arquivos ?>" style="max-width: 150px; max-height: 150px; object-fit: cover; margin: 5px;">
                        </a>
            <?php
                    // Se não for imagem, mantém um link de texto para download
                    else :
            ?>
                        <a href="uploads/<?= $arquivos ?>" download>Baixar <?= $arquivos ?></a>
            <?php
                    endif;
                endif;
            endforeach;
            ?>
        </div>
    </div>
</body>

</html>
<?php
// Define o diretório onde os arquivos serão armazenados
$diretorioArquivos = __DIR__ . '/dirArquivos/';

// Cria o diretório se não existir
if (!file_exists($diretorioArquivos)) {
    mkdir($diretorioArquivos, 0777, true);
}

// --- UPLOAD DE ARQUIVO ---
if (isset($_FILES['arquivo'])) {
    //Carrega na memória o arquivo "postado"
    $arquivo = $_FILES['arquivo'];

    //Move o arquivo que está carregado na memória com um nome temporário, para
    //O novo diretório com o nome especificado anteriormente
    if (move_uploaded_file($arquivo['tmp_name'], $diretorioArquivos . $arquivo['name'])) {
        echo "Arquivo enviado com sucesso!";
    } else {
        echo "Erro ao enviar o arquivo.";
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
    <h1>Upload de Arquivos</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label>Selecione um arquivo para enviar:</label><br><br>
        <input type="file" name="arquivo" required>
        <button type="submit">Enviar</button>
    </form>

    <h1>Download de Arquivos</h1>
    
    <table>
        <thead>
            <tr>
                <th>Nome do Arquivo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $arquivos_escaneados = scandir("dirArquivos");
            foreach ($arquivos_escaneados as $arquivo) :
                if ($arquivo != "." && $arquivo != "..") :
            ?>
                    <tr>
                        <td>
                            <?= $arquivo ?>
                        </td>
                        <td>
                            <a href="dirArquivos/<?= $arquivo ?>" download>Baixar</a>
                        </td>
                    </tr>

            <?php
                endif;
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>
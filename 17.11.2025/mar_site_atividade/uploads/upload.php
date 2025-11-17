<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'] === 0) {

        $pasta = "uploads/";

        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $caminho_final = $pasta . basename($arquivo['name']);

        if (move_uploaded_file($arquivo['tmp_name'], $caminho_final)) {

            $sql = "INSERT INTO arquivos_mar (titulo, categoria, caminho)
                    VALUES (:titulo, :categoria, :caminho)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":categoria", $categoria);
            $stmt->bindParam(":caminho", $caminho_final);
            $stmt->execute();

            echo "Arquivo enviado com sucesso!<br>";
        }
    }
}
?>

<h2>Enviar arquivo sobre o mar</h2>

<form method="POST" enctype="multipart/form-data">
    <label>Título do arquivo:</label><br>
    <input type="text" name="titulo" required><br><br>

    <label>Categoria:</label><br>
    <select name="categoria">
        <option>Animais Marinhos</option>
        <option>Oceanos</option>
        <option>Recifes de Coral</option>
        <option>Plantas Marinhas</option>
    </select><br><br>

    <label>Arquivo:</label><br>
    <input type="file" name="arquivo" required><br><br>

    <button type="submit">Enviar</button>
</form>

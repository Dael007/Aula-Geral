<?php
include "conexao.php";

$sql = "SELECT * FROM arquivos_mar ORDER BY data_upload DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$lista = $stmt->fetchAll();
?>

<h1>Arquivos sobre o Mar</h1>

<ul>
<?php foreach ($lista as $arq): ?>
    <li>
        <strong><?= $arq['titulo'] ?></strong> —
        (<?= $arq['categoria'] ?>) |
        <a href="download.php?file=<?= urlencode($arq['caminho']) ?>">Baixar</a>
    </li>
<?php endforeach; ?>
</ul>

<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Status dos Ar-Condicionados</title>
</head>
<body>

<h1>Status dos Ar-Condicionados</h1>

<!-- Ar-condicionado do Carro -->
<h2>Carro</h2>
<p>
    Estado: <?= isset($_SESSION['carro_ligado']) && $_SESSION['carro_ligado'] ? "Ligado" : "Desligado" ?><br>
    Temperatura: <?= isset($_SESSION['carro_temperatura']) ? $_SESSION['carro_temperatura'] . "°C" : "N/A" ?><br>
    <a href="modulo/carro.php">Controlar Carro</a>
</p>

<hr>

<!-- Ar-condicionado do Prédio -->
<h2>Prédio</h2>
<p>
    Estado: <?= isset($_SESSION['predio_ligado']) && $_SESSION['predio_ligado'] ? "Ligado" : "Desligado" ?><br>
    Temperatura: <?= isset($_SESSION['predio_temperatura']) ? $_SESSION['predio_temperatura'] . "°C" : "N/A" ?><br>
    <a href="modulo/predio.php">Controlar Prédio</a>
</p>

</body>
</html>

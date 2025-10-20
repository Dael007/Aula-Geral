<?php
$host = "localhost";
$usuario = "root";
$senha = "root";  // deixe vazio se você não colocou senha no MySQL
$banco = "meubanco"; // igual ao nome criado no phpMyAdmin

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>

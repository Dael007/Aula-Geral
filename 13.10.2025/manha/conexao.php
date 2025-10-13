<?php
function Getconexao()
{
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db   = 'VET';

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

    try {
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
?>

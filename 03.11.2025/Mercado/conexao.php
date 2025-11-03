<?php
 function db(){
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db   = 'Mercado';

    $mysqli = @new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_errno) {
        die('Erro ao conectar ao MySQL: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset('utf8mb4');
    return $mysqli;
}
?>
<?php
// Host do MySQL (pode incluir a porta). No XAMPP, normalmente é 'localhost' ou '127.0.0.1'.
$db_host = 'localhost:3306';
// Nome do banco de dados que será utilizado pela aplicação.
$db_name = 'catalogo_filmes';
// Usuário do MySQL (no XAMPP geralmente é 'root').
$db_user = 'root';
// Senha do MySQL (no XAMPP costuma ser vazia; ajuste conforme sua instalação).
$db_pass = 'root';
// DSN (Data Source Name): define driver, host, banco e charset para o PDO.
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

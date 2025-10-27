<?php // Início do arquivo PHP

// Carrega as configurações de conexão (host, banco, usuário, senha e DSN)
require_once __DIR__ . '/config.php';

// Cria uma instância PDO para conectar no MySQL usando as configurações do config.php
// $dsn define o driver, host, porta (se houver), banco e charset
// $db_user e $db_pass são as credenciais do banco
// O quarto parâmetro define opções de comportamento do PDO
$pdo = new PDO($dsn, $db_user, $db_pass, [
    // Lança exceções em erros (facilita o debug e o tratamento de erros)
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // Define o modo padrão de fetch como array associativo
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Desativa emulação de prepared statements (usa prepares nativos do MySQL)
    PDO::ATTR_EMULATE_PREPARES => false,
]);

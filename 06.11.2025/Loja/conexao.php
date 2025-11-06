<?php
// Define o hostname e porta do MySQL (localhost na porta padrão 3306 do XAMPP)

$host = 'localhost:3306';
// Nome do banco de dados que a aplicação irá usar
$db   = 'Loja';
// Usuário do MySQL (no XAMPP geralmente é 'root')
$user = 'root';
// Senha do MySQL (no XAMPP muitas vezes é vazia: '') — ajuste conforme seu ambiente
$pass = 'root';

// Cria o objeto de conexão PDO com DSN indicando driver (mysql), host, banco e charset
$conexao = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
// Configura o PDO para lançar exceções em caso de erro (facilita try/catch)
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//mysql: → o tipo do banco (no caso, MySQL)

//host=$host → o endereço do servidor (ex: localhost ou IP)

//dbname=$db → o nome do banco de dados

//charset=utf8mb4 → define o padrão de caracteres, garantindo que acentos, emojis e caracteres especiais sejam salvos corretamente.
// variaveis $user e $pass → usuário e senha do banco de dados
//$conexao = new PDO(...);
//PDO::ATTR_ERRMODE → define o modo de erro do PDO
//PDO::ERRMODE_EXCEPTION → define que os erros devem ser tratados como exceções
//$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Aqui você define que os erros devem ser tratados como exceções

?>


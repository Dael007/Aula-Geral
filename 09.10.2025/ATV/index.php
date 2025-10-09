

<?php
// Configurações de conexão com o banco de dados MySQL
$servername = "localhost"; // Endereço do servidor MySQL
$username = "root";        // Usuário do MySQL
$password = "root";        // Senha do MySQL
$dbname = "localizacoes";  // Nome do banco de dados criado

// Cria a conexão com o banco de dados usando MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    // Se houver erro, exibe mensagem e encerra o script
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário de forma segura
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : "";

    // Só tenta inserir se ambos os campos estiverem preenchidos
    if (!empty($nome) && !empty($descricao)) {
        // Monta a query SQL para inserir os dados na tabela 'lugares'
        $sql = "INSERT INTO lugares (nome, descricao) VALUES ('" . $conn->real_escape_string($nome) . "', '" . $conn->real_escape_string($descricao) . "')";

        // Executa a query e verifica se deu certo
        if ($conn->query($sql) === TRUE) {
            echo "<p>Localização salva com sucesso!</p>";
        } else {
            echo "<p>Erro: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Preencha todos os campos!</p>";
    }
}
?>



<!--
    Página HTML para cadastro de localização
    Possui um formulário com campos para nome e descrição
    O formulário envia os dados via POST para o próprio arquivo
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define o charset para acentuação -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade -->
    <title>Cadastrar Localização</title> <!-- Título da aba do navegador -->
    <link rel="stylesheet" href="index.css"> <!-- Importa o CSS para estilizar a página -->
</head>
<body>
    <div> <!-- Container para centralizar e estilizar o formulário -->
        <h2>Cadastrar Localização</h2> <!-- Título do formulário -->
        <form method="post"> <!-- Formulário que envia dados via POST -->
            <label for="nome">Nome do lugar</label> <!-- Rótulo do campo nome -->
            <input type="text" id="nome" name="nome" required> <!-- Campo de texto para o nome -->
            <br>
            <br>
            <label for="descricao">Descrição</label> <!-- Rótulo do campo descrição -->
            <textarea name="descricao" id="descricao" required></textarea> <!-- Campo de texto para descrição -->
            <button type="submit">Salvar</button> <!-- Botão para enviar o formulário -->
        </form>
    </div>
</body>
</html>

<!--
====================
SQL PARA O BANCO DE DADOS
====================
DROP TABLE IF EXISTS lugares;
CREATE TABLE lugares (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL
);
-- Para conferir as colunas:
DESCRIBE lugares;
-- Para ver os dados:
SELECT * FROM lugares;
-- Não use 'descrisao' em nenhum lugar!
-- Use sempre 'descricao' (com Ç) no banco e no PHP
-- ====================
-- FIM DO SQL
-- ====================
--
<?php
require 'conexao.php';

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql_check = "SELECT id FROM usuario WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $mensagem = "Este e-mail já está cadastrado!";
    } else {
        $sql = "INSERT INTO usuario (nome, Email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha);

        if ($stmt->execute()) {
            $mensagem = "Cadastro realizado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Ar-Condicionado</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <?php if($mensagem != "") { echo "<p class='mensagem'>$mensagem</p>"; } ?>
        <form method="post">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome" required>

            <label>E-mail:</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" required>

            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

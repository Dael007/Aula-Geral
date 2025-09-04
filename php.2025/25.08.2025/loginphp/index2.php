<?php
require_once 'usuario.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $usuario = new Usuario(
            $_POST['nome'],
            $_POST['sobrenome'],
            $_POST['login'],
            $_POST['email'],
            $_POST['senha']
        );

        // Se chegou aqui, é porque não deu erro
        $mensagem = "Usuário " . $usuario->getNomeCompleto() . " cadastrado com sucesso!";
    } catch (Exception $e) {
        $mensagem = "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Usuario</h1>
    <?php if ($mensagem): ?>
        <p><strong><?= $mensagem ?></strong></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Sobrenome:</label><br>
        <input type="text" name="sobrenome" required><br><br>

        <label>Login:</label><br>
        <input type="text" name="login" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Entra</button>
    </form>
</body>
</html>

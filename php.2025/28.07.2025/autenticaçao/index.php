<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação</title>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $aluno = $_POST['nome'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($aluno == 'aluno' && $senha == "1234") {
            echo "<p>Login <strong>correto</strong>.</p>";
        } else {
            echo "<p>Login <strong>errado</strong>.</p>";
        }
    }
    ?>

    <!-- "Balão" de login com HTML puro -->
    <h2>Login do Aluno</h2>
    <form method="post" action="">
        <label for="nome">Usuário:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    
    if ($username === 'aluno' && $password === '1234') {
        
        header("Location: ../Bsecundaria/secundaria.php");
        exit();
    } else {
        
        $error = "Usuário ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="conteudo">
    <h1 class="bemvindo">Bem-vindo à página de login</h1>
    <?php if (!empty($error)): ?>
      <p style="color: red;"><strong><?= htmlspecialchars($error) ?></strong></p>
    <?php endif; ?>
    <form class="login2" action="" method="post">
      <label for="username">Usuário:</label>
      <input class="username" type="text" id="username" name="username" required>
      <br>
      <label for="password">Senha:</label>
      <input class="password" type="password" id="password" name="password" required>
      <br>
      <input class="submit" type="submit" value="Entrar">
    </form>
  </div>
</body>
</html>

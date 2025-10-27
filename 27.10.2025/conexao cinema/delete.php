<?php // Página para excluir filme com confirmação
require_once __DIR__ . '/db.php';

// Lê o ID pela querystring
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    http_response_code(400);
    echo 'ID inválido';
    exit;
}

// Busca o registro para mostrar na confirmação
$stmt = $pdo->prepare('SELECT id, titulo FROM filmes WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$filme = $stmt->fetch();

if (!$filme) {
    http_response_code(404);
    echo 'Filme não encontrado';
    exit;
}

// Se confirmou via POST, exclui e redireciona
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $del = $pdo->prepare('DELETE FROM filmes WHERE id = :id');
    $del->bindValue(':id', $id, PDO::PARAM_INT);
    $del->execute();
    header('Location: /sim/index.php?del=1');
    exit;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Excluir Filme</title>
  <link rel="stylesheet" href="/sim/styles.css">
  <style>
    .card{max-width:640px;margin:24px auto;padding:16px;border:1px solid #2a3240;border-radius:10px;background:#0f131a}
    .actions{display:flex;gap:8px;justify-content:flex-end;margin-top:12px}
  </style>
</head>
<body>
  <header>
    <h1>Excluir Filme</h1>
  </header>
  <main>
    <div class="card">
      <p>Tem certeza que deseja excluir o filme <strong><?= htmlspecialchars($filme['titulo'], ENT_QUOTES, 'UTF-8') ?></strong>?</p>
      <form method="post" action="">
        <div class="actions">
          <a href="/sim/index.php"><button type="button">Cancelar</button></a>
          <button type="submit" style="border-color:#5a2430;background:#2a1214;">Excluir</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>

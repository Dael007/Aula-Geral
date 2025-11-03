
<?php
require_once __DIR__ . '/conexao.php';
header('Content-Type: text/html; charset=utf-8');

$db = db();

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$like = "%" . $q . "%";

if ($q !== '') {
    $stmt = $db->prepare("SELECT id, nome, preco, unidade, estoque FROM legumes WHERE nome LIKE ? ORDER BY nome");
    $stmt->bind_param('s', $like);
    $stmt->execute();
    $res = $stmt->get_result();
} else {
    $res = $db->query("SELECT id, nome, preco, unidade, estoque FROM legumes ORDER BY nome");
}

function render_rows($res): string {
    ob_start();
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo (int)$row['id']; ?></td>
              <td><?php echo htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
              <td>R$ <?php echo number_format((float)$row['preco'], 2, ',', '.'); ?></td>
              <td><?php echo htmlspecialchars($row['unidade'], ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php echo htmlspecialchars($row['estoque'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr><td colspan="5">Nenhum registro encontrado.</td></tr>
        <?php
    }
    return ob_get_clean();
}

// Resposta parcial para AJAX: retorna apenas as linhas da tabela
if (isset($_GET['partial']) && $_GET['partial'] === '1') {
    echo render_rows($res);
    exit;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Legumes</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <button><a href="index.php">volta</a></button>
  <header>
    <h1>Legumes</h1>
    <p>Digite para buscar por nome.</p>
  </header>

  <main class="container">
    <input id="busca" type="search" placeholder="Buscar legumes..." value="<?php echo htmlspecialchars($q, ENT_QUOTES, 'UTF-8'); ?>" style="max-width:420px;width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;">

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Unidade</th>
          <th>Estoque</th>
        </tr>
      </thead>
      <tbody id="tbody-rows">
        <?php echo render_rows($res); ?>
      </tbody>
    </table>
  </main>

  <script>
    const input = document.getElementById('busca');
    const tbody = document.getElementById('tbody-rows');
    let timer;

    input.addEventListener('input', () => {
      clearTimeout(timer);
      timer = setTimeout(async () => {
        const q = encodeURIComponent(input.value);
        const url = `legumes.php?partial=1&q=${q}`;
        const res = await fetch(url, { headers: { 'X-Requested-With': 'fetch' } });
        const html = await res.text();
        tbody.innerHTML = html;
        history.replaceState(null, '', `legumes.php?q=${q ? q : ''}`);
      }, 300);
    });
  </script>
</body>
</html>

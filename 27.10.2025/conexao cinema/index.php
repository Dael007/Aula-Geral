<?php // Bloco PHP inicial: busca e prepara dados
require_once __DIR__ . '/db.php'; // Inclui a conexão PDO
$q = isset($_GET['q']) ? trim($_GET['q']) : ''; // Lê o termo de busca da querystring
$limit = 50; // Limite de registros na listagem
if ($q === '') { // Sem busca: consulta simples ordenada por data
    $stmt = $pdo->prepare("SELECT id, titulo, genero, ano, nota, criado_em FROM filmes ORDER BY criado_em DESC, id DESC LIMIT :lim"); // Prepara SQL
    $stmt->bindValue(':lim', $limit, PDO::PARAM_INT); // Define limite
} else { // Com busca: filtra por título ou gênero (usando LIKE)
    $like = "%" . $q . "%"; // Monta padrão para LIKE
    $stmt = $pdo->prepare("SELECT id, titulo, genero, ano, nota, criado_em FROM filmes WHERE titulo LIKE :q1 OR genero LIKE :q2 ORDER BY criado_em DESC, id DESC LIMIT :lim"); // Prepara SQL com filtros
    $stmt->bindValue(':q1', $like, PDO::PARAM_STR); // Vincula parâmetro do título
    $stmt->bindValue(':q2', $like, PDO::PARAM_STR); // Vincula parâmetro do gênero
    $stmt->bindValue(':lim', $limit, PDO::PARAM_INT); // Define limite
}
$stmt->execute(); // Executa a consulta
$rows = $stmt->fetchAll(); // Busca todos os resultados como array associativo
?>
<!doctype html> <!-- Define o tipo do documento HTML5 -->
<html lang="pt-br"> <!-- Idioma do documento: português do Brasil -->
<head>
  <meta charset="utf-8"> <!-- Codificação UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsivo em mobile -->
  <title>Catálogo de Filmes</title>
  <link rel="stylesheet" href="/sim/styles.css"> <!-- CSS principal -->
</head>
<body> <!-- Corpo da página -->
  <header> <!-- Cabeçalho com título -->
    <h1>Catálogo de Filmes</h1>
  </header>
  <main> <!-- Conteúdo principal -->
    <?php if (isset($_GET['ok']) && $_GET['ok'] === '1'): ?>
      <div class="muted">Filme adicionado com sucesso.</div>
    <?php endif; ?>
    <?php if (isset($_GET['del']) && $_GET['del'] === '1'): ?>
      <div class="muted">Filme excluído com sucesso.</div>
    <?php endif; ?>
    <form method="get" action=""> <!-- Formulário de busca (método GET) -->
      <input type="text" name="q" placeholder="Buscar por título ou gênero" value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>"> <!-- Campo de busca -->
      <button type="submit">Buscar</button> <!-- Botão de envio -->
    </form>

    <div class="muted">Mostrando <?= count($rows) ?> resultados<?= $q !== '' ? " para '" . htmlspecialchars($q, ENT_QUOTES, 'UTF-8') . "'" : '' ?>.</div> <!-- Indicador de resultados -->

    <div style="display:flex;justify-content:space-between;align-items:center;margin:8px 0 12px;">
      <div class="muted"></div>
      <a href="/sim/add.php"><button type="button">Adicionar filme</button></a>
    </div>

    <table> <!-- Tabela de listagem -->
      <thead> <!-- Cabeçalho da tabela -->
        <tr>
          <th>Título</th>
          <th>Gênero</th>
          <th>Ano</th>
          <th>Nota</th>
          <th>Criado</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody> <!-- Corpo da tabela -->
        <?php if (!$rows): ?>
        <tr> <!-- Linha única quando não há registros -->
          <td colspan="6" class="muted">Nenhum registro encontrado.</td>
        </tr>
        <?php else: ?>
        <?php foreach ($rows as $r): ?>
        <tr class="data-row" tabindex="0" aria-expanded="false" data-id="<?= (int)$r['id'] ?>"> <!-- Linha clicável/focável -->
          <td><?= htmlspecialchars($r['titulo'], ENT_QUOTES, 'UTF-8') ?></td> <!-- Título do filme -->
          <td><?= $r['genero'] !== null ? '<span class="pill">' . htmlspecialchars($r['genero'], ENT_QUOTES, 'UTF-8') . '</span>' : '' ?></td> <!-- Gênero -->
          <td><?= $r['ano'] !== null ? (int)$r['ano'] : '' ?></td> <!-- Ano -->
          <td><?= $r['nota'] !== null ? htmlspecialchars($r['nota'], ENT_QUOTES, 'UTF-8') : '' ?></td> <!-- Nota -->
          <td><?= htmlspecialchars($r['criado_em'], ENT_QUOTES, 'UTF-8') ?></td> <!-- Data de criação -->
          <td><a href="/sim/delete.php?id=<?= (int)$r['id'] ?>"><button type="button">Excluir</button></a></td>
        </tr>
        <tr class="details-row" data-open="false"> <!-- Linha de detalhes (expandir/recolher) -->
          <td colspan="6">
            <div class="details-panel"> <!-- Painel com os detalhes -->
              <div><strong>Título:</strong> <?= htmlspecialchars($r['titulo'], ENT_QUOTES, 'UTF-8') ?></div>
              <div><strong>Gênero:</strong> <?= $r['genero'] !== null ? htmlspecialchars($r['genero'], ENT_QUOTES, 'UTF-8') : '—' ?></div>
              <div><strong>Ano:</strong> <?= $r['ano'] !== null ? (int)$r['ano'] : '—' ?></div>
              <div><strong>Nota:</strong> <?= $r['nota'] !== null ? htmlspecialchars($r['nota'], ENT_QUOTES, 'UTF-8') : '—' ?></div>
              <div class="muted">Pressione Enter novamente para recolher</div> <!-- Instrução ao usuário -->
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </main>
  <script src="/sim/app.js"></script> <!-- Script com interações -->
</body>
</html>

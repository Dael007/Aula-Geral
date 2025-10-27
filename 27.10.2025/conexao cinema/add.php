<?php // Página para adicionar novo filme (início do PHP)
require_once __DIR__ . '/db.php'; // Inclui a conexão PDO

$erros = []; // Array para acumular mensagens de erro de validação
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Se o formulário foi enviado por POST
    $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : ''; // Lê e higieniza o título (obrigatório)
    $genero = isset($_POST['genero']) ? trim($_POST['genero']) : null; // Lê o gênero (opcional)
    $ano = isset($_POST['ano']) && $_POST['ano'] !== '' ? (int)$_POST['ano'] : null; // Converte ano para inteiro (ou null)
    $nota = isset($_POST['nota']) && $_POST['nota'] !== '' ? (float)str_replace(',', '.', $_POST['nota']) : null; // Converte nota para float, aceita vírgula

    if ($titulo === '') { // Validação: título obrigatório
        $erros[] = 'Título é obrigatório.'; // Adiciona erro
    }
    if ($ano !== null && ($ano < 1800 || $ano > 2100)) { // Validação de faixa do ano
        $erros[] = 'Ano deve estar entre 1800 e 2100.'; // Adiciona erro
    }
    if ($nota !== null && ($nota < 0 || $nota > 10)) { // Validação de faixa da nota
        $erros[] = 'Nota deve estar entre 0 e 10.'; // Adiciona erro
    }

    if (!$erros) { // Se não houve erros de validação
        $stmt = $pdo->prepare('INSERT INTO filmes (titulo, genero, ano, nota) VALUES (:titulo, :genero, :ano, :nota)'); // Prepara INSERT
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR); // Vincula título
        // Vincula gênero (como NULL quando vazio)
        $stmt->bindValue(':genero', $genero !== '' ? $genero : null, $genero !== '' ? PDO::PARAM_STR : PDO::PARAM_NULL);
        // Vincula ano (NULL se não informado)
        if ($ano === null) {
            $stmt->bindValue(':ano', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':ano', $ano, PDO::PARAM_INT);
        }
        // Vincula nota (NULL se não informada)
        if ($nota === null) {
            $stmt->bindValue(':nota', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':nota', $nota); // Usa o tipo padrão para float
        }
        $stmt->execute(); // Executa o INSERT
        header('Location: /sim/index.php?ok=1'); // Redireciona para a listagem com mensagem de sucesso
        exit; // Encerra a execução após o redirecionamento
    }
}
?>
<!doctype html>
<html lang="pt-br"> <!-- Documento em português do Brasil -->
<head>
  <meta charset="utf-8"> <!-- Codificação -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsivo -->
  <title>Adicionar Filme</title> <!-- Título da página -->
  <link rel="stylesheet" href="/sim/styles.css"> <!-- CSS global -->
  <style> /* Estilos específicos desta página */
    .form-card{max-width:640px;margin:24px auto;padding:16px;border:1px solid #2a3240;border-radius:10px;background:#0f131a} /* Cartão do formulário */
    .field{display:flex;flex-direction:column;gap:6px;margin-bottom:12px} /* Campo com label + input */
    label{color:#cbd5e1;font-size:14px} /* Aparência dos rótulos */
    .actions{display:flex;gap:8px;justify-content:flex-end;margin-top:12px} /* Área dos botões */
    .error{background:#2a1214;border:1px solid #6b1f26;color:#ffd0d4;padding:10px 12px;border-radius:8px;margin-bottom:12px} /* Caixa de erros */
  </style>
</head>
<body>
  <header> <!-- Cabeçalho -->
    <h1>Adicionar Filme</h1>
  </header>
  <main> <!-- Conteúdo principal -->
    <div class="form-card"> <!-- Cartão que envolve o formulário -->
      <?php if ($erros): ?> <!-- Se houver erros, exibe a caixa de erros -->
        <div class="error">
          <?php foreach ($erros as $e): ?> <!-- Lista cada mensagem de erro -->
            <div><?= htmlspecialchars($e, ENT_QUOTES, 'UTF-8') ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form method="post" action=""> <!-- Formulário de envio por POST -->
        <div class="field"> <!-- Campo: Título (obrigatório) -->
          <label for="titulo">Título *</label>
          <input type="text" id="titulo" name="titulo" required value="<?= isset($titulo) ? htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') : '' ?>">
        </div>
        <div class="field"> <!-- Campo: Gênero (opcional) -->
          <label for="genero">Gênero</label>
          <input type="text" id="genero" name="genero" value="<?= isset($genero) ? htmlspecialchars($genero, ENT_QUOTES, 'UTF-8') : '' ?>">
        </div>
        <div class="field"> <!-- Campo: Ano (opcional, 1800-2100) -->
          <label for="ano">Ano</label>
          <input type="number" id="ano" name="ano" min="1800" max="2100" value="<?= isset($ano) && $ano !== null ? (int)$ano : '' ?>">
        </div>
        <div class="field"> <!-- Campo: Nota (opcional, 0-10) -->
          <label for="nota">Nota (0 a 10, use vírgula ou ponto)</label>
          <input type="text" id="nota" name="nota" inputmode="decimal" value="<?= isset($nota) && $nota !== null ? htmlspecialchars((string)$nota, ENT_QUOTES, 'UTF-8') : '' ?>">
        </div>
        <div class="actions"> <!-- Botões de ação -->
          <a href="/sim/index.php"><button type="button">Cancelar</button></a>
          <button type="submit">Salvar</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>

<?php
// Importa a conexão PDO com o banco (cria a variável $conexao)
require_once __DIR__ . '/conexao.php';
// Configura cabeçalhos HTTP para evitar cache e sempre carregar dados atualizados
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

// Busca na tabela produtos somente itens com estoque disponível, ordenando por nome
$produtos = $conexao->query('SELECT ID, NOME, PRECO, ESTOQUE FROM produtos WHERE ESTOQUE > 0 ORDER BY NOME')->fetchAll(PDO::FETCH_ASSOC);

// Prepara mensagem de feedback (sucesso/erro) recebida via query string após redirecionamento
$mensagem = '';
$status = '';
if (!empty($_GET['ok'])) { $mensagem = 'Venda registrada com sucesso!'; $status = 'ok'; }
if (!empty($_GET['erro'])) { $mensagem = htmlspecialchars($_GET['erro']); $status = 'erro'; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja - Vender Produto</title>
  <link rel="stylesheet" href="index.css">
  <style>
    /* CSS inline mínimo caso index.css não carregue */
    body { font-family: Arial, sans-serif; max-width: 720px; margin: 24px auto; padding: 0 12px; }
  </style>
  <script>
    // Opcional: ao trocar produto, sugere valor (preço * quantidade)
    function sugerirValor() {
      const select = document.getElementById('produto_id');
      const qtd = parseInt(document.getElementById('quantidade').value || '0', 10);
      const opt = select.options[select.selectedIndex];
      if (!opt) return;
      const preco = parseFloat(opt.getAttribute('data-preco')) || 0;
      const campo = document.getElementById('valor_vendido');
      if (qtd > 0) campo.value = (preco * qtd).toFixed(2);
    }
  </script>
  </head>
<body>
  <?php if ($mensagem): ?>
    <div class="msg <?= $status ?>"><?php echo $mensagem; ?></div>
  <?php endif; ?>
  <h1>Registrar Venda</h1>

  <form method="post" action="vender.php">
    <div>
      <label for="produto_id">Produto</label>
      <select id="produto_id" name="produto_id" required onchange="sugerirValor()">
        <option value="" disabled selected>Selecione um produto</option>
        <?php foreach ($produtos as $p): ?>
          <option value="<?= htmlspecialchars($p['ID']) ?>" data-preco="<?= htmlspecialchars($p['PRECO']) ?>">
            <?= htmlspecialchars($p['NOME']) ?> — R$ <?= number_format($p['PRECO'], 2, ',', '.') ?> — Estoque: <?= (int)$p['ESTOQUE'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label for="quantidade">Quantidade</label>
      <input type="number" id="quantidade" name="quantidade" min="1" step="1" required oninput="sugerirValor()" />
    </div>

    <div>
      <label for="valor_vendido">Valor vendido (R$)</label>
      <input type="number" id="valor_vendido" name="valor_vendido" min="0" step="0.01" required />
      <div class="hint">Você pode informar qualquer valor vendido. Use o seletor/quantidade para sugerir automático.</div>
    </div>
                                                                        
    <button type="submit">Registrar venda</button>
  </form>
</body>
</html>

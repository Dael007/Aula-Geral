<?php
// Importa a conexão PDO com o banco
require_once __DIR__ . '/conexao.php';

// Captura e normaliza os dados enviados pelo formulário (POST)
$produto_id    = isset($_POST['produto_id']) ? (int)$_POST['produto_id'] : 0;
$quantidade    = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 0;
$valor_vendido = isset($_POST['valor_vendido']) ? (float)$_POST['valor_vendido'] : 0.0;

try {
    // Validação básica dos dados recebidos
    if ($produto_id <= 0 || $quantidade <= 0 || $valor_vendido < 0) {
        throw new Exception('Dados da venda inválidos.');
    }

    // Inicia transação: caixa e estoque devem atualizar juntos (atomicidade)
    $conexao->beginTransaction();

    // Lê o estoque atual do produto e bloqueia a linha até o fim da transação (FOR UPDATE)
    $stmt = $conexao->prepare('SELECT ESTOQUE FROM produtos WHERE ID = :id FOR UPDATE');
    $stmt->execute([':id' => $produto_id]);
    $estoque = $stmt->fetchColumn();

    if ($estoque === false) {
        throw new Exception('Produto não encontrado.');
    }
    if ((int)$estoque < $quantidade) {
        throw new Exception('Estoque insuficiente.');
    }

    // Atualiza o saldo do caixa somando o valor vendido
    $stmt = $conexao->prepare('UPDATE caixa SET SALDO = SALDO + :valor WHERE ID = 1');
    $stmt->execute([':valor' => $valor_vendido]);

    // Atualiza o estoque do produto subtraindo a quantidade vendida
    $stmt = $conexao->prepare('UPDATE produtos SET ESTOQUE = ESTOQUE - :qtd WHERE ID = :id');
    $stmt->execute([':qtd' => $quantidade, ':id' => $produto_id]);

    // Finaliza a transação gravando as alterações
    $conexao->commit();
    // Redireciona para a página principal com mensagem de sucesso (PRG: Post/Redirect/Get)
    header('Location: index.php?ok=1');
    exit;
} catch (Exception $e) {
    if ($conexao->inTransaction()) {
        // Em caso de erro, desfaz as alterações
        $conexao->rollBack();
    }
    // Redireciona com mensagem de erro pela query string (evita reenvio do formulário)
    $erro = urlencode('Erro ao registrar venda: ' . $e->getMessage());
    header('Location: index.php?erro=' . $erro);
    exit;
}
?>

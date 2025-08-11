<?php
session_start();

// Lista de produtos
$produtos = [
    1 => ['nome' => 'Camisa', 'preco' => 50.00],
    2 => ['nome' => 'Calça', 'preco' => 80.00],
    3 => ['nome' => 'Tênis', 'preco' => 120.00],
];

// Inicializa histórico de compras na sessão
if (!isset($_SESSION['historico'])) {
    $_SESSION['historico'] = [];
}

// Adiciona ao histórico
if (isset($_GET['comprar'])) {
    $id = (int) $_GET['comprar'];
    if (isset($produtos[$id])) {
        $_SESSION['historico'][] = $produtos[$id];
    }

}

// Calcular totais
$totalItens = count($_SESSION['historico']);
$totalPreco = array_sum(array_column($_SESSION['historico'], 'preco'));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="pagina.css">
</head>
<body>
    <h1>Loja Virtual</h1>

    <div class="produtos">
        <?php foreach ($produtos as $id => $p): ?>
            <div class="produto">
                <h3><?= $p['nome'] ?></h3>
                <p>Preço: R$ <?= number_format($p['preco'], 2, ',', '.') ?></p>
                <a href="?comprar=<?= $id ?>"><button>Comprar</button></a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="resumo">
        <h2>Resumo das Compras</h2>
        <p><strong>Total de Itens:</strong> <?= $totalItens ?></p>
        <p><strong>Valor Total:</strong> R$ <?= number_format($totalPreco, 2, ',', '.') ?></p>

        <h3>Histórico:</h3>
        <?php if ($totalItens == 0): ?>
            <p>Nenhuma compra realizada ainda.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($_SESSION['historico'] as $item): ?>
                    <li><?= $item['nome'] ?> - R$ <?= number_format($item['preco'], 2, ',', '.') ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>

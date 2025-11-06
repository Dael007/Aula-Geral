<?php
// Diagnóstico e auto-correção simples da instalação do banco Loja
header('Content-Type: text/plain; charset=utf-8');

require_once __DIR__ . '/conexao.php';

function println($msg){ echo $msg . "\n"; }

try {
    $dbName = $conexao->query('SELECT DATABASE()')->fetchColumn();
    println("Banco conectado: " . ($dbName ?: '(desconhecido)'));

    // Verifica se tabela produtos existe
    $temProdutos = false;
    try {
        $conexao->query('SELECT 1 FROM produtos LIMIT 1');
        $temProdutos = true;
    } catch (Throwable $e) {
        $temProdutos = false;
    }

    // Verifica se tabela caixa existe
    $temCaixa = false;
    try {
        $conexao->query('SELECT 1 FROM caixa LIMIT 1');
        $temCaixa = true;
    } catch (Throwable $e) {
        $temCaixa = false;
    }

    if (!$temProdutos || !$temCaixa) {
        println('Criando estruturas que faltam...');
        $conexao->beginTransaction();

        if (!$temProdutos) {
            $conexao->exec('CREATE TABLE IF NOT EXISTS produtos (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                NOME VARCHAR(100) NOT NULL,
                PRECO DECIMAL(12,2) NOT NULL,
                ESTOQUE INT NOT NULL DEFAULT 0
            ) ENGINE=InnoDB');
        }

        if (!$temCaixa) {
            $conexao->exec('CREATE TABLE IF NOT EXISTS caixa (
                ID TINYINT NOT NULL PRIMARY KEY,
                SALDO DECIMAL(12,2) NOT NULL DEFAULT 0.00
            ) ENGINE=InnoDB');
            $conexao->exec("INSERT IGNORE INTO caixa (ID, SALDO) VALUES (1, 0.00)");
        }

        $conexao->commit();
        println('Estruturas garantidas.');
    } else {
        println('Tabelas já existem.');
    }

    // Verifica se há produtos, se não, insere dados base
    $qtd = (int)$conexao->query('SELECT COUNT(*) FROM produtos')->fetchColumn();
    if ($qtd === 0) {
        println('Inserindo produtos de exemplo...');
        $conexao->exec("INSERT INTO produtos (NOME, PRECO, ESTOQUE) VALUES
            ('Teclado', 250.00, 10),
            ('Mouse Gamer', 150.00, 20),
            ('Monitor', 300.00, 15),
            ('Gabinete', 200.00, 15),
            ('Headset', 100.00, 15),
            ('Webcam', 50.00, 15)");
        println('Produtos inseridos.');
    } else {
        println('Produtos já cadastrados: ' . $qtd);
    }

    // Mostra saldo do caixa
    $saldo = $conexao->query('SELECT SALDO FROM caixa WHERE ID = 1')->fetchColumn();
    if ($saldo !== false) {
        println('Saldo do caixa: R$ ' . number_format((float)$saldo, 2, ',', '.'));
    } else {
        println('Registro do caixa (ID=1) não encontrado.');
    }

    println("OK. Acesse /Loja/index.php para usar.");
} catch (Throwable $e) {
    println('Falha no verificador: ' . $e->getMessage());
}

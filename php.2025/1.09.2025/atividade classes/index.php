<?php
        require_once 'servico.php';
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produto</title>
</head>
<body>
    <h1>servicos prestados </h1>
   <?php
    
    $produto = new produto("mamao", 5.55, new DateTime("30-08-2025"));
    echo "<h2>Informaços do produto</h2>";
    echo "Nome: ". $produto->GetNome(). "<br>";
    echo "valor unitario:R$  ". number_format($produto->GetValorUnitario(),2,',','.')."<br>";
    echo "Data de vencimento: " . $produto->GetDataVencimento() . "<br>";
    echo "Status: ". $produto->VerificarVencimento(). "<br>"; 

   ?>
</body>
</html>
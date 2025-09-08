<?php
require_once '08.09.2025/Empregado.php';
require_once '08.09.2025/comissionado.php';

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicial</title>
</head>
<body>
<?php
    $comissionado = new comissionado("Jao", "21988888888", "987.654.321-00", 250000.00, 3);
    echo "<br>" . "Nome: " . $comissionado->Getnome();
    echo "<br>" . "Cel: " . $comissionado->GetNumerocelular();
    echo "<br>" . "CPF: " . $comissionado->GetCPF();
    echo "<br>" . "Total de vendas: " . $comissionado->GetvalorTotalVendas();
    echo "<br>" . "Percentual de comissao: " . $comissionado->GetPercentialComissao();
    echo "<br>" . "Salario a receber: " . $comissionado->CalcularPagamento();
?>
</body>
</html>
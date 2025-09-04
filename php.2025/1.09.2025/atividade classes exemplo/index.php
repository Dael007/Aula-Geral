<?php
    require_once 'serviços.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviço Prestado</title>
</head>
<body>
    <h1>Serviços Prestados</h1>

    <?php
        $servico = new Servico(
            "Conserto de arcondicionado",
            "Serviço destinado a todos os tipos de reparo de ar condicionado", 50, 60
        );
        

        $servico->SetValorHora(50.00);
        $servico->SetDiasGarantia(2);
        
        echo 'Nome do serviço: ' . $servico->GetNome() . '<br>';
        echo 'Descrição do serviço: ' . $servico->GetDescricao() . '<br>';
        echo 'Valor por hora de servico '. $servico->GetValorHora() . '<br>';
        echo 'prazo de garantias '. $servico->GetDiasGarantia();
        echo '<br>';
        echo 'O valor de servico de 3 horas foi: '. $servico->GetValor(180);
    ?>
</body>
</html>
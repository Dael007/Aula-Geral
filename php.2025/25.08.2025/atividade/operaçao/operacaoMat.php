<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operação Matemática</title>
    <link rel="stylesheet" href="operacaoMat.css">
</head>
<body>

    <h1>Operação Matemática</h1>

    <form method="post">
        <label for="numero1">Número 1:</label><br>
        <input type="number" name="numero1" id="numero1" step="any" required><br><br>

        <label for="numero2">Número 2:</label><br>
        <input type="number" name="numero2" id="numero2" step="any" required><br><br>

        <label>Operação:</label><br>
        <input type="radio" name="operacao" value="soma" id="soma" required>
        <label for="soma">Somar</label>

        <input type="radio" name="operacao" value="multiplicar" id="multiplicar">
        <label for="multiplicar">Multiplicar</label><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $n1 = floatval($_POST['numero1']);
        $n2 = floatval($_POST['numero2']);
        $op = $_POST['operacao'];

        echo '<div class="resultado">';
        if ($op === 'soma') {
            $resultado = $n1 + $n2;
            echo "🔢 Resultado da <strong>soma</strong>: $n1 + $n2 = <strong>$resultado</strong>";
        } elseif ($op === 'multiplicar') {
            $resultado = $n1 * $n2;
            echo "✖ Resultado da <strong>multiplicação</strong>: $n1 × $n2 = <strong>$resultado</strong>";
        } else {
            echo "❌ Operação inválida.";
        }
        echo '</div>';
    }
    ?>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Média</title>
    <link rel="stylesheet" href="media.css">
</head>
<body>

    <h1>Cálculo de Média</h1>

    <form method="post">
        <label for="nota1">Nota 1:</label><br>
        <input type="number" name="nota1" id="nota1" step="0.01" min="0" max="10" required><br><br>

        <label for="nota2">Nota 2:</label><br>
        <input type="number" name="nota2" id="nota2" step="0.01" min="0" max="10" required><br><br>

        <label for="nota3">Nota 3:</label><br>
        <input type="number" name="nota3" id="nota3" step="0.01" min="0" max="10" required><br><br>

        <label for="nota4">Nota 4:</label><br>
        <input type="number" name="nota4" id="nota4" step="0.01" min="0" max="10" required><br><br>

        <button type="submit">Calcular Média</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $n1 = floatval($_POST['nota1']);
        $n2 = floatval($_POST['nota2']);
        $n3 = floatval($_POST['nota3']);
        $n4 = floatval($_POST['nota4']);

        $media = ($n1 + $n2 + $n3 + $n4) / 4;

        echo '<div class="resultado">';
        echo "📊 A média das notas é: <strong>" . number_format($media, 2, ',', '.') . "</strong><br>";

        if ($media >= 7) {
            echo "✅ Resultado: <strong>Aprovado</strong>";
        } elseif ($media >= 5) {
            echo "⚠ Resultado: <strong>Recuperação</strong>";
        } else {
            echo "❌ Resultado: <strong>Reprovado</strong>";
        }
        echo '</div>';
    }
    ?>

</body>
</html>

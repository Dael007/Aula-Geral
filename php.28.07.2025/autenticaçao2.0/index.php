<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação 2.0</title>
</head>

<body>

    <form method="post">
        <label for="nota1">Nota 1:</label>
        <input type="number" name="nota1" required><br>

        <label for="nota2">Nota 2:</label>
        <input type="number" name="nota2" required><br>

        <label for="nota3">Nota 3:</label>
        <input type="number" name="nota3" required><br>

        <label for="nota4">Nota 4:</label>
        <input type="number" name="nota4" required><br><br>

        <input type="submit" value="Calcular Média">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota1 = $_POST['nota1'] ?? 0;
        $nota2 = $_POST['nota2'] ?? 0;
        $nota3 = $_POST['nota3'] ?? 0;
        $nota4 = $_POST['nota4'] ?? 0;

        $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;

        echo "<p><strong>Média:</strong> $media</p>";

        if ($media >= 6) {
            echo "<p class=c'Aprovado'>Aprovado</p>";
        } else {
            echo "<p class='Reprovado'>Reprovado</p>";
        }
    }
    ?>

</body>
</html>
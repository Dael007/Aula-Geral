<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de altura</title>
    <link rel="stylesheet" href="validarAT.css">
</head>
<body>
    
    <h1>Validação de Altura</h1>

    <form method="post">
        <label for="altura">Digite sua altura (em metros):</label><br><br>
        <input type="number" name="altura" id="altura" step="0.01" min="0" required><br>
        <button type="submit">Validar</button>

    </form>
    <p class="php">
        <?php 
         
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $altura = floatval($_POST["altura"]);
        $alturaMinima = 1.50;

        echo '<div class="resultado">';
        if ($altura >= $alturaMinima) {
            echo "✅ Sua altura é <strong>$altura m</strong>. Você tem altura suficiente.";
        } else {
            echo "❌ Sua altura é <strong>$altura m</strong>. Você está abaixo da altura mínima de $alturaMinima m.";
        }
        echo '</div>';
    }
    ?>
    
    </p>
    
</body>
</html>
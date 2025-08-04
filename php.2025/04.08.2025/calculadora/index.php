<?php
// Inicializa variáveis
$peso = $altura = $imc = $classificacao = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = floatval($_POST["peso"]);
    $altura = floatval($_POST["altura"]);

    if ($peso > 0 && $altura > 0) {
        $imc = $peso / ($altura * $altura);

        // Classificação do IMC
        if ($imc < 18.5) {
            $classificacao = "Magreza";
        } elseif ($imc < 25) {
            $classificacao = "Normal";
        } elseif ($imc < 30) {
            $classificacao = "Sobrepeso";
        } elseif ($imc < 35) {
            $classificacao = "Obesidade Grau 1";
        } elseif ($imc < 40) {
            $classificacao = "Obesidade Grau 2";
        } else {
            $classificacao = "Obesidade Grau 3";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 5px solid #28a745;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        footer {
            margin-top: 40px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>

    <h1>Calculadora de IMC</h1>

    <div class="container">
        <form method="post">
            <label for="peso">Peso (kg):</label>
            <input type="number" name="peso" step="0.01" placeholder="Ex: 70" required value="<?= htmlspecialchars($peso) ?>">

            <label for="altura">Altura (m):</label>
            <input type="number" name="altura" step="0.01" placeholder="Ex: 1.75" required value="<?= htmlspecialchars($altura) ?>">

            <button type="submit">Calcular IMC</button>
        </form>

        <?php if ($imc): ?>
            <div class="resultado">
                Seu IMC é <strong><?= number_format($imc, 2, ',', '.') ?></strong> — <strong><?= $classificacao ?></strong>
            </div>
        <?php endif; ?>

        <table>
            <tr>
                <th>IMC</th>
                <th>Classificação</th>
            </tr>
            <tr><td>Menor que 18,5</td><td>Magreza</td></tr>
            <tr><td>18,5 – 24,9</td><td>Normal</td></tr>
            <tr><td>25 – 29,9</td><td>Sobrepeso</td></tr>
            <tr><td>30 – 34,9</td><td>Obesidade Grau 1</td></tr>
            <tr><td>35 – 39,9</td><td>Obesidade Grau 2</td></tr>
            <tr><td>Maior que 40</td><td>Obesidade Grau 3</td></tr>
        </table>
    </div>

    <footer>
        &copy; 2025 Calculadora de IMC em PHP
    </footer>

</body>
</html>

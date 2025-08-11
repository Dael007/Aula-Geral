<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
        }

        .resultado {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora PHP</h2>
        <form method="post" action="">
            <input type="number" name="num1" placeholder="Digite o primeiro número" required>
            <input type="number" name="num2" placeholder="Digite o segundo número" required>
            <select name="operacao" required>
                <option value="soma">Soma (+)</option>
                <option value="subtracao">Subtração (-)</option>
                <option value="multiplicacao">Multiplicação (×)</option>
                <option value="divisao">Divisão (÷)</option>
            </select>
            <button type="submit" name="calcular">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operacao = $_POST['operacao'];
            $resultado = "";

            switch ($operacao) {
                case "soma":
                    $resultado = $num1 + $num2;
                    break;
                case "subtracao":
                    $resultado = $num1 - $num2;
                    break;
                case "multiplicacao":
                    $resultado = $num1 * $num2;
                    break;
                case "divisao":
                    if ($num2 != 0) {
                        $resultado = $num1 / $num2;
                    } else {
                        $resultado = "Erro: Divisão por zero!";
                    }
                    break;
                default:
                    $resultado = "Operação inválida";
            }

            echo "<div class='resultado'>Resultado: $resultado</div>";
        }
        ?>
    </div>
</body>
</html>

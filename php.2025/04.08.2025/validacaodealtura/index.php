<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Altura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 32px 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        input[type="number"] {
            padding: 8px;
            width: 120px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 16px;
        }
        button {
            padding: 8px 16px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .mensagem {
            margin-top: 16px;
            font-weight: bold;
        }
        .mensagem.aprovado {
            color: green;
        }
        .mensagem.reprovado {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Validação de Altura</h2>
        <form id="formAltura" method='post' action='src/altura.php'>
            <label for="altura">Digite sua altura (cm):</label><br>
            <input type="number" id="altura" name="altura" min="0" required><br>
            <button type="submit">Validar</button>
        </form>
        <div id="mensagem" class="mensagem"></div>
    </div>
   
</body>
</html> 
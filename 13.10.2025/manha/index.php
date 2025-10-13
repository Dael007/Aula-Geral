<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Pet</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <h1>Informações do Pet</h1>

    <form action="salvar_pet.php" method="POST">
        <label for="petName">Nome do Pet:</label>
        <input type="text" id="petName" name="petName" required>

        <label for="petidade">Idade:</label>
        <input type="text" id="petidade" name="petidade" required>

        <label for="petRaca">Raça:</label>
        <input type="text" id="petRaca" name="petRaca" required>

        <label for="petDS">Descrição da aparência:</label>
        <input type="text" id="petDS" name="petDS" required>

        <button type="submit">Salvar</button>
    </form>

</body>
</html>

<?php
require_once 'Pet.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['petName'] ?? '';
    $idade = $_POST['petidade'] ?? '';
    $raca = $_POST['petRaca'] ?? '';
    $descricao = $_POST['petDS'] ?? '';

    if (!empty($name) && !empty($idade) && !empty($raca) && !empty($descricao)) {
        $pet = new Pet(0, $name, $idade, $descricao, $raca);
        $pet->Salvar();

        echo "
        <div style='
            background: #dff0d8;
            color: #3c763d;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            margin: 40px auto;
            text-align: center;
            font-family: Arial;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        '>
            <h2>🐾 Pet salvo com sucesso!</h2>
            <a href='index.php' style='
                text-decoration: none;
                background: #4CAF50;
                color: white;
                padding: 10px 20px;
                border-radius: 6px;
                display: inline-block;
                margin-top: 10px;
            '>Voltar</a>
        </div>";
    } else {
        echo "Erro: todos os campos são obrigatórios!";
    }
}
?>

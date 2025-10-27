<?php
    // Abre o bloco de código PHP
    function GetConexao(){ // Declara uma função que criará e retornará uma conexão PDO com o MySQL
        $servidor = "localhost:3306"; // Endereço do servidor MySQL e porta
        $banco_dados = "POKEDEX";     // Nome do banco de dados a ser utilizado
        $usuario = "root";            // Usuário do MySQL
        $senha = "root";              // Senha do MySQL

        // Monta o DSN (Data Source Name) informando o driver (mysql), host e banco de dados
        $stringConexao = "mysql:host=$servidor;dbname=$banco_dados";
        
        try{ // Inicia um bloco de tentativa: se algo falhar aqui, iremos para o catch
            // Cria o objeto PDO usando o DSN, usuário e senha fornecidos
            $conexao = new PDO($stringConexao, $usuario, $senha);
            // Se a conexão foi bem-sucedida, retornamos o objeto PDO para quem chamou a função
            return $conexao;
        }
        catch(Exception $erro){ // Captura qualquer exceção gerada ao tentar conectar
            // Exibe uma mensagem de erro com detalhes do problema ocorrido na conexão
            echo "Erro ao conectar no banco de dados: " . $erro->getMessage();
        }

        // Caso ocorra um erro e entre no catch, não há return explícito; a função retornará null
    }
?>
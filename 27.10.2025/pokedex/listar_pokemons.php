<!DOCTYPE html>
<html lang="pt-br">
<!-- Página de listagem de Pokémons. Carrega todos os registros do banco e exibe em uma tabela. -->
<?php
    // Importa a função de conexão com o banco (PDO)
    require_once "conexao.php";
    // Obtém uma conexão ativa com o banco de dados
    $conexao = GetConexao();
    // Define a consulta que trará as colunas necessárias para a listagem
    $sql = "SELECT ID, NOME, DESCRICAO, FOTO  FROM POKEMON";
    // Prepara a consulta (boa prática para segurança e performance)
    $comando = $conexao->prepare($sql);
    // Executa a consulta preparada
    $comando->execute();
    // Busca todos os resultados como um array (por padrão, associativo se o PDO estiver configurado)
    $lista_pokemons = $comando->fetchAll();

    // A partir daqui, o HTML utiliza $lista_pokemons para renderizar a tabela
?>


<head>
    <meta charset="UTF-8">
    <title>Lista de Pokémons</title>
    <!-- Arquivo de estilos desta página -->
    <link rel="stylesheet" href="listar_pokemons.css">
</head>

<body>
    <div class="container">
        <!-- Título principal da página -->
        <h1>Pokédex - Lista de Pokémons</h1>

        <!-- Link para criar um novo registro (vai para a tela de exibição sem id) -->
        <a href="exibir_pokemon.php" class="botao-adicionar">+ Adicionar Novo Pokémon</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php // Percorre cada linha retornada do banco e monta uma linha da tabela para cada Pokémon
                foreach ($lista_pokemons as $pokemon) { ?>
                <tr>
                    <!-- Coluna com o identificador único do Pokémon -->
                    <td><?= $pokemon['ID']?></td>
                    <td>
                        <!-- Exibe a miniatura da imagem associada ao Pokémon -->
                        <img src="imagens/<?=$pokemon['FOTO']?>">
                    </td>
                    <!-- Exibe o nome do Pokémon -->
                    <td> <?= $pokemon['NOME']?> </td>
                    <td>
                        <!-- Ação para visualizar/editar o registro específico (passa o ID via query string) -->
                        <a href="exibir_pokemon.php?id=<?= $pokemon['ID']?>" class="botao-visualizar">Visualizar</a>
                    </td>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
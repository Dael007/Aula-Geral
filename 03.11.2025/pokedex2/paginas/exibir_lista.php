<?php
require_once("../conexao.php"); // Arquivo onde está a função GetConexao()

$conexao = GetConexao(); // cria a conexão com o banco

// Captura a busca (se tiver)
$busca = $_GET['busca'] ?? "";

// Monta o SQL base
$sql = "SELECT 
            p.NUMERO, 
            p.NOME, 
            p.ARQ_IMAGEM AS IMG_POKEMON,
            t1.ARQ_IMAGEM AS IMG_TIPO1,
            t2.ARQ_IMAGEM AS IMG_TIPO2
        FROM pokemon p
        LEFT JOIN tipo t1 ON p.TIPO_1 = t1.ID
        LEFT JOIN tipo t2 ON p.TIPO_2 = t2.ID";

// Adiciona o filtro, se houver pesquisa
if ($busca != "") {
    $sql .= " WHERE 
                p.NOME LIKE :busca
                OR p.NUMERO LIKE :busca
                OR t1.NOME LIKE :busca
                OR t2.NOME LIKE :busca";
}

$stmt = $conexao->prepare($sql); // prepara o SQL para receber valores com bindValue e ser executado com segurança pelo execute()
if ($busca != "") {
    $stmt->bindValue(":busca", "%$busca%"); // adiciona o valor da busca
}
$stmt->execute(); // roda o SQL
$lista_pokemons = $stmt->fetchAll(PDO::FETCH_ASSOC); // pega tudo como array associativo

// fim da parte PHP
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- configurações básicas da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <!-- arquivo de estilo -->
    <link rel="stylesheet" href="exibir_lista.css">
</head>

<body>
    <h1>Pokédex de Kanto</h1>

    <!-- formulário simples de busca -->
    <form method="get">
        <input type="text" name="busca" placeholder="Pesquise por número, nome ou tipo..." value="<?= $busca ?>">
        <button type="submit">Buscar</button>
    </form>

    <main>
        <!-- lista os pokémons -->
        <?php foreach ($lista_pokemons as $pokemon): ?>
            <div>
                <!-- mostra número e nome -->
                <div>
                    <span><?= $pokemon['NUMERO'] ?></span>
                    <span><?= $pokemon['NOME'] ?></span>
                </div>

                <!-- imagem do pokémon -->
                <img src="../imagens/pokemons/<?= $pokemon['IMG_POKEMON'] ?>" alt="<?= $pokemon['NOME'] ?>">

                <!-- imagens dos tipos -->
                <div>
                    <?php if ($pokemon['IMG_TIPO1']): ?>
                        <!-- se tiver tipo 1, mostra -->
                        <img src="../imagens/tipos/<?= $pokemon['IMG_TIPO1'] ?>" alt="Tipo 1">
                    <?php endif; ?>
                    <?php if ($pokemon['IMG_TIPO2']): ?>
                        <!-- se tiver tipo 2, mostra -->
                        <img src="../imagens/tipos/<?= $pokemon['IMG_TIPO2'] ?>" alt="Tipo 2">
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>
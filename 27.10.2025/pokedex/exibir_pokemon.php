<!DOCTYPE html>
<html lang="pt-br">

<!-- Página de exibição/edição de um Pokémon. Carrega dados (GET) para editar e processa o formulário (POST) para salvar. -->
<?php
// Importa a classe de domínio (entidade) do Pokémon
require_once 'Entidades/pokemon.php';
// Importa a função de conexão com o banco de dados (PDO)
require_once 'conexao.php';

// Variável que guardará o registro buscado no banco (ou null se for criação de novo)
$resultado_select = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Quando a página é acessada via GET, verificamos se veio um parâmetro id para EDIÇÃO
    
    $condição = isset($_GET['id']); // true/false indicando se o parâmetro id existe (não é usado depois)
    $id = isset($_GET['id']) ? $_GET['id'] : null; // captura o id (ou null se não veio)

    if ($id != null) {
        // Se há id, buscamos no banco os dados do Pokémon com esse id
        $conexao = GetConexao(); // obtém uma conexão PDO
        $sql =
            "SELECT NOME, DESCRICAO, FOTO
             FROM POKEMON
             WHERE ID = :P_ID"; // SQL com placeholder nomeado

        $comando = $conexao->prepare($sql); // prepara o comando para evitar SQL injection
        $comando->bindParam(":P_ID", $_GET['id']); // vincula o valor do id ao placeholder :P_ID
        $comando->execute();    // executa a consulta

        $resultado_select = $comando->fetch(); // obtém a primeira linha (ou false se não encontrar)
    }
}
?>

<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <!-- Arquivo de estilos desta página -->
    <link rel="stylesheet" href="exibir_pokemon.css">
</head>


<body>
    <!-- Formulário de criação/edição. method POST para enviar os dados ao servidor -->
    <form method="post">
        <section>
            <?php
               // Se veio id, preenche os campos com os valores do banco (modo edição)
               if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $nome = $resultado_select['NOME'];
                    $descricao = $resultado_select['DESCRICAO'];
                    $foto = $resultado_select['FOTO'];
               } else {
                    // Se não veio id, inicializa valores vazios (modo criação)
                    $id = "";
                    $nome = "";
                    $descricao = "";
                    $foto = "interrogação.png"; // imagem padrão para o preview
               }
            ?>

            <h1>Pokédex Nº <?=$id?> </h1>

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?=$nome?>">

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao"><?=$descricao?></textarea>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*"> <!-- campo de seleção de arquivo (apenas nome usado no front) -->
            <input type="hidden" name="fotoNome" id="fotoNome" value="<?=$foto?>" readonly> <!-- armazena o nome da imagem para enviar no POST -->

            <input type="submit" value="Salvar">
        </section>


        <section>
            <!-- Pré-visualização da imagem escolhida -->
            <img id="preview" src="imagens/<?=$foto?>" alt="Pré-visualização da imagem">
        </section>
    </form>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Quando o formulário é enviado, montamos o objeto com os dados recebidos
        $id = isset($_GET['id']) ? $_GET['id'] : null; // se há id no GET, é edição; senão, inserção
        $poke = new Pokemon(
            $id,
            $_POST['nome'],        // nome enviado pelo formulário
            $_POST['descricao'],   // descrição enviada
            $_POST['fotoNome'],    // apenas o nome do arquivo (o upload real não está implementado aqui)
        );

        // Persiste no banco; a classe atualmente faz o redirecionamento após salvar
        $poke->Salvar();
    }
    ?>


    <script>
        // Referências aos elementos do DOM usados no preview da imagem
        const inputFoto = document.getElementById('foto');
        const inputFotoNome = document.getElementById('fotoNome');
        const preview = document.getElementById('preview');

        // Quando o usuário escolhe um arquivo, atualizamos o hidden com o nome e exibimos um preview
        inputFoto.addEventListener('change', function() {
            const file = this.files[0]; // primeiro arquivo selecionado
            if (file) {
                inputFotoNome.value = file.name; // guarda o nome do arquivo no campo hidden
                const reader = new FileReader(); // leitor para gerar um preview local
                reader.onload = function(e) {
                    preview.src = e.target.result; // mostra a imagem no <img id="preview">
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file); // lê o arquivo para obter uma URL base64
            } else {
                inputFotoNome.value = '';
                preview.src = 'imagens/interrogação.png'; // volta para a imagem padrão
            }
        });
    </script>
</body>


</html>
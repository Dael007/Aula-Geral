<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página do Menu</title>
  <link rel="stylesheet" href="pagina.css">
</head>
<body>
  <h1 class="escolhe">Escolha uma opção</h1>

  <div class="botoes-central">
    <!-- Botões que redirecionam para outras páginas via PHP -->
    <form action="../carrinho/pagina.php" method="post" class="btn-form">
      <button type="submit">Compras</button>
    </form>
    <form action="../tabuada/pagina.php" method="post" class="btn-form">
      <button type="submit">Tabuada</button>
    </form>
  </div>

  <!-- Imagens logo abaixo dos botões -->
  <div class="imagens-baixo">
    <img class="carrinho" src="carrinho.png" alt="Carrinho de Compras">
    <img class="ola" src="ola.webp" alt="">
  </div>
</body>
</html>

<?php    
    // Redireciona o usuário para a página principal de exibição/edição de Pokémon.
    // Observação: como nenhuma saída foi enviada antes deste ponto, o cabeçalho HTTP
    // pode ser enviado corretamente sem causar erro de "headers already sent".
    header("Location: exibir_pokemon.php"); // Redirecionamento HTTP 302 (padrão)
    // Dica: é comum usar 'exit;' logo após o header para garantir que a execução pare,
    // porém aqui não alteramos o comportamento; apenas documentamos.
?>
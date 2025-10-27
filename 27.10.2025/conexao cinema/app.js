document.addEventListener('DOMContentLoaded', () => { // Aguarda o carregamento do DOM
  const linhas = Array.from(document.querySelectorAll('tr.data-row')); // Seleciona todas as linhas de dados
  linhas.forEach((linha) => { // Itera sobre cada linha
    const detalhes = linha.nextElementSibling; // Obtém a linha de detalhes logo abaixo
    if (!detalhes || !detalhes.classList.contains('details-row')) return; // Garante que é uma linha de detalhes

    const alternar = () => { // Função para abrir/fechar os detalhes
      const aberto = detalhes.getAttribute('data-open') === 'true'; // Estado atual (aberto/fechado)
      const vaiAbrir = !aberto; // Próximo estado
      detalhes.setAttribute('data-open', String(vaiAbrir)); // Atualiza atributo data-open
      linha.setAttribute('aria-expanded', String(vaiAbrir)); // Atualiza ARIA para acessibilidade
    };

    linha.addEventListener('click', (e) => { // Clique na linha alterna o painel
      // Ignorar cliques em links/botões dentro da linha
      if (e.target.closest('a,button,input,select,textarea')) return; // Se clicou em elemento interativo, não alterna
      alternar(); // Alterna aberto/fechado
    });

    linha.addEventListener('keydown', (e) => { // Suporte a teclado
      if (e.key === 'Enter' || e.key === ' ') { // Enter ou Espaço abre/fecha
        e.preventDefault(); // Evita scroll/submit
        alternar(); // Alterna os detalhes
      }
      if (e.key === 'ArrowDown') { // Seta para baixo move o foco para a próxima linha
        e.preventDefault(); // Evita scroll padrão
        const i = linhas.indexOf(linha); // Índice da linha atual
        const proxima = linhas[i + 1]; // Próxima linha
        if (proxima) proxima.focus(); // Foca a próxima, se existir
      }
      if (e.key === 'ArrowUp') { // Seta para cima move o foco para a linha anterior
        e.preventDefault(); // Evita scroll padrão
        const i = linhas.indexOf(linha); // Índice da linha atual
        const anterior = linhas[i - 1]; // Linha anterior
        if (anterior) anterior.focus(); // Foca a anterior, se existir
      }
    });
  });
});

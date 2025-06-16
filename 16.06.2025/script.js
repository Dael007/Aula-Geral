    // Estrutura do carrinho
    const carrinho = {};

    function adicionarItem(nome, preco, inputId) {
        const quantidade = parseInt(document.getElementById(inputId).value) || 1;
        if (!carrinho[nome]) {
            carrinho[nome] = { preco: preco, quantidade: 0 };
        }
        carrinho[nome].quantidade += quantidade;
        atualizarCarrinho();
    }

    function atualizarCarrinho() {
        const tabela = document.getElementById('tabela-carrinho');
        tabela.innerHTML = '';
        let total = 0;
        for (let fruta in carrinho) {
            const item = carrinho[fruta];
            if (item.quantidade > 0) {
                const subtotal = item.preco * item.quantidade;
                total += subtotal;
                tabela.innerHTML += `
                    <tr>
                        <td>${fruta}</td>
                        <td>R$ ${item.preco.toFixed(2)}</td>
                        <td>${item.quantidade}</td>
                        <td>R$ ${subtotal.toFixed(2)}</td>
                    </tr>
                `;
            }
        }
        document.getElementById('total').textContent = total.toFixed(2);
        aplicarDesconto();
    }

    function aplicarDesconto() {
        const desconto = parseFloat(document.getElementById('desconto').value) || 0;
        const total = parseFloat(document.getElementById('total').textContent);
        const valorDesconto = total * desconto / 100;
        const final = total - valorDesconto;
        document.getElementById('valor-desconto').textContent = valorDesconto.toFixed(2);
        document.getElementById('final').textContent = final.toFixed(2);
    }
    function limparCarrinho() {
        for (let fruta in carrinho) {
            carrinho[fruta].quantidade = 0;
        }
        atualizarCarrinho();
    }
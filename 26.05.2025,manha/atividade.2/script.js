
let pessoas = [];


function AdicionarPessoa() {
    const nome = document.getElementById("nome").value;
    const altura = parseFloat(document.getElementById("altura").value);

    if (!nome || isNaN(altura)) {
        alert("Por favor, preencha todos os campos corretamente.");
        return;
    }


    pessoas.push({ nome, altura });

    
    document.getElementById("nome").value = "";
    document.getElementById("altura").value = "";

    alert("Pessoa adicionada com sucesso!");
}


function ListarSituacoes() {
    const resultado = document.getElementById("resultado");
    resultado.innerHTML = ""; 

    const tabela = document.createElement("table");
    tabela.style.border = "1px solid black";
    tabela.style.borderCollapse = "collapse";
    tabela.style.width = "100%";

    
    const cabecalho = tabela.createTHead();
    const linhaCabecalho = cabecalho.insertRow();
    ["Nome", "Altura (m)", "Situação"].forEach(texto => {
        const th = document.createElement("th");
        th.textContent = texto;
        th.style.border = "1px solid black";
        th.style.padding = "8px";
        th.style.textAlign = "left";
        linhaCabecalho.appendChild(th);
    });

    
    const corpo = tabela.createTBody();
    pessoas.forEach(pessoa => {
        const linha = corpo.insertRow();
        const situacao = pessoa.altura > 1.50 ? "Entrada autorizada" : "Entrada não autorizada";

        [pessoa.nome, pessoa.altura.toFixed(2), situacao].forEach(dado => {
            const td = linha.insertCell();
            td.textContent = dado;
            td.style.border = "1px solid black";
            td.style.padding = "8px";
        });
    });

    
    resultado.appendChild(tabela);
}


function RecarregarPágina(){
    window.location.reload();
}
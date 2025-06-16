function GerarTabuada() {
    const numero = parseInt(document.getElementById("numero").value);
    const inicio = parseInt(document.getElementById("inicio").value);
    const fim = parseInt(document.getElementById("fim").value);
    const saida = document.getElementById("resultado");

    if (isNaN(numero) || isNaN(inicio) || isNaN(fim)) {
        alert("Preencha os campos com valores válidos.");
        return;
    }

    if (fim < inicio) {
        alert("O fim do intervalo deve ser maior ou igual ao início.");
        return;
    }

    let matriz = [];
    for (let fator = inicio; fator <= fim; fator++) {
        matriz.push([numero, fator, numero * fator]);
    }

    let tabelaHTML = `
        <table>
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Fator</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
    `;

    for (let linha of matriz) {
        tabelaHTML += `
            <tr>
                <td>${linha[0]}</td>
                <td>${linha[1]}</td>
                <td>${linha[2]}</td>
            </tr>
        `;
    }

    tabelaHTML += `
            </tbody>
        </table>
    `;

    saida.innerHTML = tabelaHTML;
}

function RecarregarPágina() {
    window.location.reload();
}
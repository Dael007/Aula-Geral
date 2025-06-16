function SelecionarSalgado (){
    //pegando os elementos//
    document.getElementById("coxinha");
    document.getElementById("esfirra")
    document.getElementById("quibe")
    //definindo as variaveis
    let total = 0;
    let escolhidos = [];

    //verificar as variaveis que estao selecionadas
    if (coxinha.checked){
        total += 5;
        escolhidos.push ("coxinha");
    }
    if (esfirra.checked){
        total += 6;
        escolhidos.push ("esfirra");
    }
    if (quibe.checked){
        total += 7;
        escolhidos.push ("quibe");
    }
    //mostrar resposta
    let resposta = document.getElementById("resposta")
    if (escolhidos.length > 0){
        resposta.innerHTML = `Você escolheu: <strong>${escolhidos.join(", ")}</strong><br>Total: <strong>R$ ${total.toFixed(2)}</strong>`;
    }else{
        resposta.innerHTML("Nenhum salgado selecionado.");
    }
}

//Limpar a resposta
function LimparTela () {
document.getElementById("coxinha").checked = false;
document.getElementById("esfirra").checked = false;
document.getElementById("quibe").checked = false;
//exibir o resultado
document.getElementById("resposta").innerHTML = "";
}
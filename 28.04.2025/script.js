function SelecionarSalgado(){

   
        
    let ArraySalgados = []
    let resposta = document.getElementById("resposta")
    resposta.innerHTML = '';

    if(document.getElementById("coxinha").checked){
        ArraySalgados.push('Coxinha');

    }
    if(document.getElementById("esfirra").checked){
        ArraySalgados.push(' Esfirra');

    }
    if(document.getElementById("quibe").checked){
        ArraySalgados.push('Quibe');


    }
    for(let i = 0; i < ArraySalgados.length; i++){
        resposta.innerHTML += ArraySalgados[i] + "<br>";
    }
    if (ArraySalgados.length== 0){
        alert("Porfavor selecione pelomenos 1");
    }
    else {
        
    }
    
}

function LimparTela () {
location.reload(window)
}

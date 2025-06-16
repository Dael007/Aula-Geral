var tentativa = 0;
function ValidarLogin () {

    //leia o usuario
    var usuario = document.getElementById("usuario").value

    //leia a senha
    var senha = document.getElementById("senha").value

    //usado para armazenar a mensagem que sera exibida no HTML
    var mensagem = "";
    

    //se o usuario for aluno e senha for 1234
    if (usuario == "aluno" && senha == "1234"){
        mensagem = "Autenticado";
    } else {
        tentativa += 1;
    }
    document.getElementById("mensagem").innerText = mensagem;
}
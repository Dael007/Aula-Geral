function login(){
    let email = document.getElementById("email").value
    let senha = document.getElementById("senha").value

    console.log(senha, email)

    if (email != '' && senha != ''){

        if (email == 'adamastor@gmail.com' && senha == '1234'){
            window.location.href = 'paginacentral.html'
        }
        
         else {
            alert('Email e/ou senha incorretos!')
        }

    } else {
        alert('Insira dados válidos nos campos!')
    }
}
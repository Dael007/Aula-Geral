function VerificarRadio(){
    let faixaEtaria ="";
    if (document.getElementById("ate14").checked){
        faixaEtaria ="criança"

    }
    else if (document.getElementById("ate25").checked){
        faixaEtaria = "jovem";
    }
    else if(document.getElementById("ate64").checked){
     faixaEtaria = "Adulto";
    }
    else if(document.getElementById("65acima").checked){
        faixaEtaria ="Idoso";
    }
    
    
    document.getElementById("respostaRadio").innerText="parabens vc é "+faixaEtaria;


    }
    
    
    


<?php
    class produto {
    private $nome;
    private $ValorUnitario;
    private $DataVencimento;

    public function __construct($nome, $ValorUnitario, $DataVencimento){
        $this->nome = $nome;
        $this->ValorUnitario = $ValorUnitario;
        $this->DataVencimento = $DataVencimento;
    }
    public function GetNome(){
        return $this->nome;
    }

    public function GetValorUnitario(){
        return $this->ValorUnitario;
    }

    public function GetDataVencimento(){
        return $this->DataVencimento->format('d/m/Y');
    }
    public function Setnome($nome){
        $this->nome = $nome;
    }
    public function SetValorUnitario($ValorUnitario){
        $this->ValorUnitario = $ValorUnitario;
    }
    public function SetDataVencimento($DataVencimento){
        $this->DataVencimento = $DataVencimento;
    }


    public function VerificarVencimento(){
        $hoje = new DateTime();
        if ($this->DataVencimento <= $hoje){
            return"vencido";
        }else{
            return"Nao esta vencido";
        }

    }
}
?>
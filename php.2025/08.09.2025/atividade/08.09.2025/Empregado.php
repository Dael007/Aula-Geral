<?php
abstract class Empregador{
    protected $nome;
    protected $numerocelular;
    protected $CPF;

    public function __construct($nome, $numerocelular, $CPF) {
        $this->Setnome($nome);
        $this->Setnumerocelular($numerocelular);
        $this->SetCPF($CPF);
    }
    
    public function Getnome(){
        return $this->nome;
    }
    public function GetNumerocelular(){
        return $this->numerocelular;
    }
    public function GetCPF(){
        return $this->CPF;
    }
    public function SetCPF($cpf) {
        $this->CPF = $cpf;
    }
    public function Setnumerocelular($numerocelular) {
        $this->numerocelular = $numerocelular;
    }

    public function Setnome($nome) {
        $this->nome = $nome;
    }

    abstract public function CalcularPagamento();
    

}
 

?>
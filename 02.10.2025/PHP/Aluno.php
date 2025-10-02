<?php

require_once 'Pessoa.php';

class Aluno extends Pessoa {
    public $ra;
    public $nota1;
    public $nota2;
    public $valorAjudaCusto;

    public function __construct($nome, $cpf, $dataNascimento, $ra, $nota1, $nota2, $valorAjudaCusto) {
        parent::__construct($nome, $cpf, $dataNascimento);
        $this->ra = $ra;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->valorAjudaCusto = $valorAjudaCusto;
    }

    public function CalcularNota() {
        return ($this->nota1 + $this->nota2) / 2;
    }

    public function CalcularPagamento() {
        return $this->valorAjudaCusto;
    }
}

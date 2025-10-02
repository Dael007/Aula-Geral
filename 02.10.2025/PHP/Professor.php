<?php

require_once 'Pessoa.php';

class Professor extends Pessoa {
    public $salario;
    public $desconto;

    public function __construct($nome, $cpf, $dataNascimento, $salario, $desconto) {
        parent::__construct($nome, $cpf, $dataNascimento);
        $this->salario = $salario;
        $this->desconto = $desconto;
    }

    public function CalcularPagamento() {
        return $this->salario - $this->desconto;
    }
}

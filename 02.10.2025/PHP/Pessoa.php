<?php

require_once 'IPessoa.php';

class Pessoa implements IPessoa {
    public $nome;
    public $cpf;
    public $dataNascimento;

    public function __construct($nome, $cpf, $dataNascimento) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
    }

    public function CalcularIdade() {
        $nascimento = new DateTime($this->dataNascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($nascimento)->y;
        return $idade;
    }

    public function SetCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function CalcularPagamento() {
        return 0; // Implementado nas subclasses
    }
}

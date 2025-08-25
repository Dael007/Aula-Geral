<?php
class Usuario {
    // Atributos privados
    private $nome;
    private $sobrenome;
    private $login;
    private $email;
    private $senha;

    // Construtor
    public function __construct($nome, $sobrenome, $login, $email, $senha) {
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
        $this->setLogin($login);
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    // Getters e Setters
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        if (strlen($senha) <= 6) {
            throw new Exception("A senha deve ter mais de 6 caracteres.");
        }
        $this->senha = $senha;
    }

    // Método para retornar nome completo
    public function getNomeCompleto() {
        return $this->nome . ' ' . $this->sobrenome;
    }
}
?>

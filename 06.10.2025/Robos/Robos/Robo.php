<?php
require_once 'IRobot.php';

abstract class Robo implements IRobot {
    protected $anoLancamento;
    protected $modelo;
    protected $ativo;

    public function __construct($anoLancamento, $modelo) {
        $this->anoLancamento = $anoLancamento;
        $this->modelo = $modelo;
        $this->ativo = false;
    }

    public function ativar() {
        if (!$this->ativo) {
            $this->ativo = true;
            echo "{$this->modelo} ativado com sucesso!<br>";
        } else {
            echo "{$this->modelo} já está ativo.<br>";
        }
    }

    public function desativar() {
        if ($this->ativo) {
            $this->ativo = false;
            echo "{$this->modelo} desativado.<br>";
        } else {
            echo "{$this->modelo} já está desativado.<br>";
        }
    }

    abstract public function iniciar();
}
?>
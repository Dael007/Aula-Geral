<?php
require_once("IArcondicionado.php");

class ARpredio implements IArcondicionado {
    private $temperatura;
    private $ligado;

    public function __construct() {
        $this->temperatura = 22; 
        $this->ligado = false;  
    }

    public function ligar() {
        $this->ligado = true;
    }

    public function desligar() {
        $this->ligado = false;
    }

    public function aumentarTemperatura() {
        $this->temperatura += 1;
    }

    public function diminuirTemperatura() {
        $this->temperatura -= 1;
    }

    public function getTemperatura() {
        return $this->temperatura;
    }

    public function isLigado() {
        return $this->ligado;
    }
}
?>

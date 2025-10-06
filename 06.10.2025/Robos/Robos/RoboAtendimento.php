<?php
require_once 'Robo.php';

class RoboAtendimento extends Robo {
    public function iniciar() {
        if ($this->ativo) {
            echo "Olá! Sou o robô {$this->modelo}. Como posso ajudar hoje?<br>";
        } else {
            echo "O robô precisa estar ativado para iniciar o atendimento.<br>";
        }
    }
}
?>

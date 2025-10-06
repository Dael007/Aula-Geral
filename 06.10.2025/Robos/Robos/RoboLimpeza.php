<?php
require_once 'Robo.php';

class RoboLimpeza extends Robo {
    private $dataUltimaVarredura;

    public function iniciar() {
        if ($this->ativo) {
            $this->dataUltimaVarredura = date('d/m/Y H:i:s');
            echo "{$this->modelo} iniciando varredura de sujeira no local...<br>";
            echo "Data da varredura: {$this->dataUltimaVarredura}<br>";
        } else {
            echo "O robô precisa estar ativado para iniciar a limpeza.<br>";
        }
    }
}
?>
<?php
    interface IArcondicionado{
        public function ligar();
        public function desligar();
        public function AumentarTemperatura();
        function DiminuirTemperatura();
    }
?>
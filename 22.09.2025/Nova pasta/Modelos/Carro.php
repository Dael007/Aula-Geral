<?php
    require_once 'IVeiculo.php';

    class Carro implements IVeiculo{
        private $marca;
        private $velocidadeAtual;
        private $velocidadeMaxima;        

        public function __construct($p1, $p2, $p3)
        {
            $this->marca = $p1;
            $this->velocidadeAtual = $p2;
            $this->velocidadeMaxima = $p3;
        }

        public function GetVelocidadeAtual(){
            return $this->velocidadeAtual;
        }

        public function Acelerar(){
            $this->velocidadeAtual++;
        }

        public function Frear(){
            $this->velocidadeAtual--;
        }
    }
?>
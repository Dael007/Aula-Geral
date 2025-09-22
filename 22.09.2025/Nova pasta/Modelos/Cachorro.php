<?php
    require_once 'IAnimal.php';
    
    class Cachorro implements IAnimal{
        private $nome;
        private $dataNascimento;

        public function __construct($p1, $p2)
        {
            $this->nome = $p1;
            $this->dataNascimento = $p2;
        }

        public function EmitirSomVocal(){
            return "Au au!";
        }

        public function Saltar(){
            return "O animal pulou 50cm";
        }

        public function Brincar(){
            return "hahaha";
        }
    }
?>
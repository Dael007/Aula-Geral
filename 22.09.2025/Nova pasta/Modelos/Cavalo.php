<?php
require_once 'IAnimal.php';
require_once 'IVeiculo.php';

class Cavalo implements IAnimal, IVeiculo
{
    private $nome;
    private $velocidadeMaxima;

    public function __construct($p1, $p2)
    {
        $this->nome = $p1;
        $this->velocidadeMaxima = $p2;
    }

    public function EmitirSomVocal()
    {
        return "inhinhinhinhi!";
    }

    public function Saltar()
    {
        return "O cavalo saltou 1m";
    }

    public function Acelerar()
    {
        return "O cavalo está cavalgando 1km/h mais RÁPIDO";
    }

    public function Frear()
    {
        return "O cavalo está cavalgando 1km/h mais DEVAGAR";
    }
}

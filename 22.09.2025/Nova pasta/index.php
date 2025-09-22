<?php
require_once 'Modelos/Cachorro.php';
require_once 'Modelos/Cavalo.php';
require_once 'Modelos/Carro.php';

$cao1 = new Cachorro('Totó', '15/08/2025');

echo $cao1->EmitirSomVocal();
echo $cao1->Saltar();

echo '<br>';

$cavalo1 = new Cavalo('Pé de pano', 15);

echo $cavalo1->EmitirSomVocal();
echo $cavalo1->Saltar();

echo '<br>';
echo '<br>';

$carro1 = new Carro('Chevrolet', 0, 150);

$carro1->Acelerar();
echo '<br>';

echo $carro1->GetVelocidadeAtual();
echo '<br>';

$carro1->Acelerar();
echo '<br>';

echo $carro1->GetVelocidadeAtual();
echo '<br>';

$carro1->Frear();
echo '<br>';

echo $carro1->GetVelocidadeAtual();
echo '<br>';

echo $cavalo1->Acelerar();
echo '<br>';
echo $cavalo1->Frear();
echo '<br>';

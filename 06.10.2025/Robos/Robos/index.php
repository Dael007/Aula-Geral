<?php
require_once 'RoboAtendimento.php';
require_once 'RoboLimpeza.php';

$robo1 = new RoboAtendimento(2024, "AtendeX-200");
$robo2 = new RoboLimpeza(2023, "LimpBot-3000");

echo "<strong>--- Teste Robo de Atendimento ---</strong><br>";
$robo1->ativar();
$robo1->iniciar();
$robo1->desativar();

echo "<br><strong>--- Teste Robo de Limpeza ---</strong><br>";
$robo2->ativar();
$robo2->iniciar();
$robo2->desativar();
?>
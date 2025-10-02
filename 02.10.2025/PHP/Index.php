<?php

require_once 'Aluno.php';
require_once 'Professor.php';

// Criando um aluno fictício
$aluno = new Aluno('João Silva', '123.456.789-00', '2000-05-20', 'RA1234', 8.5, 7.0, 500);

// Criando um professor fictício
$professor = new Professor('Maria Souza', '987.654.321-00', '1975-08-15', 3000, 300);

// Testando os métodos do aluno
echo "Aluno: " . $aluno->nome . "\n";
echo "Idade: " . $aluno->CalcularIdade() . " anos\n";
echo "Média das notas: " . $aluno->CalcularNota() . "\n";
echo "Ajuda de custo: R$ " . $aluno->CalcularPagamento() . "\n\n";

// Testando os métodos do professor
echo "Professor: " . $professor->nome . "\n";
echo "Idade: " . $professor->CalcularIdade() . " anos\n";
echo "Salário líquido: R$ " . $professor->CalcularPagamento() . "\n";

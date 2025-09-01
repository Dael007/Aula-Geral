<?php
class Servico
{
    private $nome;

    private $descricao;

    private $valorhora;

    private $diasgarantia;

    public function __construct($nome, $descricao, $valorhora, $diasgarantia){
            $this->SetNome($nome);
            $this->SetDescricao($descricao);
            $this->Setvalorhora($valorhora);
            $this->SetDiasGarantia($diasgarantia);
        }
    

    public function SetNome($parametroNome): void
    {
        if (strlen($parametroNome) == 2) {
            throw new InvalidArgumentException(
                message: "O nome deve ter mais do que 2 caracteres"
            );
        }

        $this->nome = $parametroNome;
    }

    public function SetDescricao($parametroDescricao): void
    {
        if (strlen($parametroDescricao) <= 10) {
            throw new Exception(
                message: "A descrição deve ter mais do que 10 caracteres"
            );
        }

        $this->descricao = $parametroDescricao;
    }

    public function SetValorHora($parametroValorHora): void
    {
        if ($parametroValorHora < 0) {
            throw new Exception(
                message: "A descrição deve ter mais do que 10 caracteres"
            );
        }

        $this->valorhora = $parametroValorHora;
    }
    public function SetDiasGarantia($parametroDiasGarntia): void
    {
        if ($parametroDiasGarntia < 0) {
            throw new Exception(
                message: "A descrição deve ter mais do que 10 caracteres"
            );
        } else {
            $this->diasgarantia = $parametroDiasGarntia;
        }
    }

    public function GetNome(): string
    {
        return $this->nome;
    }

    public function GetDescricao(): string
    {
        return $this->descricao;
    }

    public function GetValorHora(): float
    {
        return $this->valorhora;
    }

    public function GetDiasGarantia(): int
    {
        return $this->diasgarantia;
    }
    public function GetValor($minutos){
        $horas = $minutos / 60;
        $valor = $horas * $this->valorhora;
        return $valor;
    }
}

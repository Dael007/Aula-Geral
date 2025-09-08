<?php
    require_once 'Empregado.php';
    class comissionado extends Empregador {
        public $valorTotalVendas;
        public $PercentialComissao;
        public function __construct($nome, $numerocelular, $CPF, $valorTotalVendas, $PercentialComissao) {
            parent::__construct($nome, $numerocelular, $CPF);
            $this->SetvalorTotalVendas($valorTotalVendas);
            $this->SetPercentialComissao($PercentialComissao);
        }
        public function GetvalorTotalVendas(){
            return $this->valorTotalVendas;
        }
        public function SetvalorTotalVendas($valorTotalVendas){
            $this->valorTotalVendas = $valorTotalVendas;
        }
        public function GetPercentialComissao(){
            return $this->PercentialComissao;
        }
        public function SetPercentialComissao($PercentialComissao){
            $this->PercentialComissao = $PercentialComissao;
        }
        public function CalcularPagamento(){
            return $this->valorTotalVendas * $this->PercentialComissao / 100;
        }
        
    }
?>
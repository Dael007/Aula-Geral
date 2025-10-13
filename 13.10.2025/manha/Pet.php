<?php
require_once 'conexao.php';

class Pet
{
    private $id;
    private $name;
    private $idade;
    private $description;
    private $raca;

    public function __construct($id, $name, $idade, $description, $raca)
    {
        $this->id = $id;
        $this->name = $name;
        $this->idade = $idade;
        $this->description = $description;
        $this->raca = $raca;
    }

    public function Salvar()
    {
        $conexao = Getconexao();

        if ($this->id <= 0) {
            $sql = "INSERT INTO Pet (nome, idade, raca, descricao)
                    VALUES (:NOME, :IDADE, :RACA, :DESCRICAO)";

            $comando = $conexao->prepare($sql);
            $comando->bindParam(":NOME", $this->name);
            $comando->bindParam(":IDADE", $this->idade);
            $comando->bindParam(":RACA", $this->raca);
            $comando->bindParam(":DESCRICAO", $this->description);
            $comando->execute();
        }
    }
}
?>

<?php
require_once 'conexao.php';
class Pokemon
{
    private $id;
    private $nome;
    private $descricao;
    private $foto;

    public function __construct($id, $nome, $desc, $foto)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $desc;
        $this->foto = $foto;
    }

    function Salvar()
    {
        $conexao = GetConexao();

        if ($this->id == null) {
            $sql =
                "INSERT INTO POKEMON 
                    (NOME, DESCRICAO, FOTO)
                 VALUES
                    (:P_NOME, :P_DESCRICAO, :P_FOTO)";
            
            $comando = $conexao->prepare($sql);                    
        } else {
            $sql =
                "UPDATE POKEMON 
                 SET
                    NOME = :P_NOME,
                    DESCRICAO = :P_DESCRICAO,
                    FOTO = :P_FOTO
                 WHERE
                    ID = :P_ID";
            
            $comando = $conexao->prepare($sql);
            $comando->bindParam(":P_ID", $this->id);
        }

        try {            
            $comando->bindParam(":P_NOME", $this->nome);
            $comando->bindParam(":P_DESCRICAO", $this->descricao);
            $comando->bindParam(":P_FOTO", $this->foto);
            $comando->execute();

            if($this->id == null){
                $this->id = $conexao->lastInsertId();
            }

            header("Location: exibir_pokemon.php?id=" . $this->id);            
        } catch (Exception $erro) {
            echo "Erro ao salvar: " . $erro->getMessage();
        }
    }
}

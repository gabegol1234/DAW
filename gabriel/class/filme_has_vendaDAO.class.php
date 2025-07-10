<?php
include_once "filme_has_venda.class.php";

class filmes_has_vendaDAO{
    private $conexao;

    public function __construct(){
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=gabriel_ecommerce",
        "root", "" );
        
    }
    public function inserir(filmes_has_venda $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO venda_has_produto
            (:id_venda, :id_produto, :preco,)
            Values
            (:id_venda, :id_produto, :preco)"
        );
        $sql->bindValue(":id_venda", $obj->getId_vendas());
        $sql->bindValue(":id_produto", $obj->getId_produto());
        $sql->bindValue(":preco", $obj->getPreco());
    }

    
}


?>
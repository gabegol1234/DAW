<?php

include_once "categorias.class.php";
class categoriasDAO
{
   private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=gabriel_ecommerce",
            "root",
            ""
        );
    }

    public function listar()
    {
        $sql = $this->conexao->prepare(
            "SELECT * FROM categorias"
        );
        $sql->execute();
        return $sql->fetchAll();
    }

    public function inserir(categoria $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO categorias
            (nome)
            VALUES
            ( :nome)"
        );
        $sql->bindValue(":nome", $obj->getnome());

        return $sql->execute();
    }

    public function excluir($id)
    {
        $sql = $this->conexao->prepare("
        DELETE FROM categorias WHERE id_categoria = :id_categoria
        ");
        $sql->bindValue(":id_categoria",  $id);
        return $sql->execute();
    }

    public function retornarUm($id)
    {
        $sql = $this->conexao->prepare("
        SELECT * FROM categorias WHERE id_categoria=:id
        ");
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(categoria $categoria)
    {
        $sql = $this->conexao->prepare("
        UPDATE categorias SET
        nome = :nome
        WHERE id_categoria = :id_categorias
        ");
        $sql->bindValue(":id_categorias", $categoria->getId_categoria());
        $sql->bindValue(":nome", $categoria->getNome());
        return $sql->execute();
    }
}
?>

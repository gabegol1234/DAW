<?php

include_once "img.class.php";

class imgDAO
{
    private $conexao;
    private $con;

    public function __construct()
    {
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=gabriel_ecommerce",
            "root",
            ""
        );
        $this->con = mysqli_connect("localhost", "root", "", "gabriel_ecommerce");
    }

    public function listar()
    {
        $sql = $this->conexao->prepare("SELECT * FROM imagem");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function inserir(img $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO imagem
            (nome, id_filmes)
            VALUES
            (:nome, :id_filmes)"
        );
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":id_filmes", $obj->getId_filmes());
        return $sql->execute();
    }

    public function excluir($id)
    {
        $sql = $this->conexao->prepare("
            DELETE FROM imagens WHERE id_imagem = :id
        ");
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }

    public function retornarUm($id)
    {
        $sql = $this->conexao->prepare("
            SELECT * FROM imagem WHERE id_filmes = :id LIMIT 1
        ");
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(img $obj)
    {
        $sql = $this->conexao->prepare("
            UPDATE imagem SET
            nome = :nome,
            id_filmes = :id_filmes
            WHERE id_imagem = :id_imagem
        ");
        $sql->bindValue(":id_imagens", $obj->getId_imagens());
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":id_filmes", $obj->getId_filmes());
        return $sql->execute();
    }
}
?>

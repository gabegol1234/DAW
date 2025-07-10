<?php

include_once "produtos.class.php";
class produtosDAO
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
            "SELECT * FROM clientes"
        );
        $sql->execute();
        return $sql->fetchAll();
    }
    public function inserir(clientes $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO clientes
            (nome,usuario,senha,contato,cpf)
            VALUES
            (:nome,:usuario,:senha,:contato,:cpf)"
        );
        $sql-> bindValue(":nome", $obj->getNome());
        $sql-> bindValue(":usuario", $obj->getusuario());
        $sql-> bindValue(":senha", $obj->getSenha());
        $sql-> bindValue(":contato", $obj->getContato());
        $sql-> bindValue(":cpf", $obj->getCpf());
        return $sql->execute();
    }
    public function excluir($id)
    {
        $sql = $this->conexao->prepare("
        DELETE FROM clientes WHERE idclientes = :id
        ");
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }
    public function retornarUm($id)
    {
        $sql = $this->conexao->prepare("
        SELECT * FROM clientes WHERE idclientes=:id
        ");
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }
    public function editar(clientes $clientes){
        $sql= $this->conexao->prepare("
        UPDATE clientes SET
        nome = :nome, usuario= :usuario, senha =:senha, cpf = :cpf, contato = :contato
        WHERE idclientes =:idclientes
        ");
        $sql->bindValue(":idclientes", $clientes->getIdclientes());
        $sql->bindValue(":contato", $clientes->getContato());
        $sql->bindValue(":senha", $clientes->getSenha());
        $sql->bindValue(":nome", $clientes->getNome());
        $sql->bindValue(":cpf", $clientes->getCpf());
        $sql->bindValue(":usuario", $clientes->getUsuario());
        return $sql->execute();
        
        
        
    }
}

?>
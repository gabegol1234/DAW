<?php

include_once "clientes.class.php";

class clientesDAO
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
        $sql = $this->conexao->prepare(
            "SELECT * FROM clientes"
        );
        $sql->execute();
        return $sql->fetchAll();
    }
    public function inserir(clientes $obj)
    {

        $query = mysqli_query($this->con, "SELECT * FROM clientes WHERE cpf = '".$obj->getCpf()."'");
        if(mysqli_fetch_assoc($query)) {
            return 2;
        }
        $query = mysqli_query($this->con, "SELECT * FROM clientes WHERE usuario = '".$obj->getUsuario()."'");
        if(mysqli_fetch_assoc($query)) {
            return 3;
        }

        $sql = $this->conexao->prepare(
            "INSERT INTO clientes
            (nome,usuario,senha,contato,cpf)
            VALUES
            (:nome,:usuario,:senha,:contato,:cpf)"
        );
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":usuario", $obj->getusuario());
        $sql->bindValue(":senha", $obj->getSenha());
        $sql->bindValue(":contato", $obj->getContato());
        $sql->bindValue(":cpf", $obj->getCpf());
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
    public function login(clientes $clientes){
        $sql = $this->conexao->prepare("
        SELECT * FROM clientes WHERE usuario = :usuario
        ");
        $sql->bindValue(":usuario", $clientes->getUsuario());
        $sql->execute();
        if($sql->rowCount()>0){
            while($retorno = $sql->fetch()){
                if($retorno["senha"] == $clientes->getSenha())
                {
                    return $retorno; //tudo ok! faça o login
                }


            }
            return 1;//senha incorreta
        }
        else{
            return 2; //usuario  nao cadastrado
        }
    }
    public function editar(clientes $clientes){

        $query = mysqli_query($this->con, "SELECT * FROM clientes WHERE cpf = '".$clientes->getCpf()."' AND idclientes != '".$clientes->getIdclientes()."'");
        if(mysqli_fetch_assoc($query)) {
            return 2;
        }
        $query = mysqli_query($this->con, "SELECT * FROM clientes WHERE usuario = '".$clientes->getUsuario()."' AND idclientes != '".$clientes->getIdclientes()."'");
        if(mysqli_fetch_assoc($query)) {
            return 3;
        }        

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
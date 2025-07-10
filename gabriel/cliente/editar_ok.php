<?php
//echo"<pre>";
//print_r($_POST);
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";


$obj = new clientes();
$obj->setIdclientes($_POST["clientes"]);
$obj->setNome($_POST["nome"]);
$obj->setUsuario($_POST["usuario"]);
$obj->setSenha($_POST["senha"]);
$obj->setContato($_POST["contato"]);
$obj->setCpf($_POST["cpf"]);
$objDAO = new clientesDAO();
$retorno = $objDAO->editar($obj);
switch ($retorno) {
    case 1:
        header("location:listar.php?editarOk");
        break;
    case 2:
        echo "Erro: CPF já cadastrado";
        break;
    case 3:
        echo "Erro: Username já cadastrado";
        break;
    default:
        header("location:listar.php?editarErro");
        break;
}
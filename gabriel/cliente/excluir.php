<?php
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";
$id = $_GET["id"];
$objDAO = new clientesDAO();
$retorno = $objDAO->excluir($id);

if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");
?>
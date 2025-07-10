<?php
//echo"<pre>";
//print_r($_POST);
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";


$obj = new categoria();
$obj->setId_categoria($_POST["id"]);
$obj->setnome($_POST["nome"]);

$objDAO = new categoriasDAO();
$retorno = $objDAO->editar($obj);
if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");
?>
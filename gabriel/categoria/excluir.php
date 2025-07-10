<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";
$id = $_GET["id_categoria"];
$objDAO = new categoriasDAO();
$retorno = $objDAO->excluir($id);

if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");
?>
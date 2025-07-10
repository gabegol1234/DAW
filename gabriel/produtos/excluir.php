<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
$id_filmes = isset($_GET["id_filmes"]) ? $_GET["id_filmes"] : null;
$objDAO = new filmesDAO();
$retorno = $objDAO->excluir($id_filmes);

if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");
?>
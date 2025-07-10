<?php
// echo "<pre>";
 //print_r($_POST);
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$obj = new Filmes();
$obj->setId_filmes($_POST["id_filmes"]);
$obj->setOfertar($_POST["ofertar"]);

$objDAO = new filmesDAO();

$retorno = $objDAO->ofertar($obj);

if ($retorno)
    header("Location: listar.php?ofertaEditada=ok");
else
    header("Location: listar.php?erroOferta=1");
?>

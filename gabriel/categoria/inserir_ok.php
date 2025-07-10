<?php
//echo"<pre>";
//print_r($_POST);
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$obj = new categoria();
$obj->setnome($_POST["nome"]);

$objDAO = new categoriasDAO();
$retorno = $objDAO->inserir($obj);
if($retorno)
    echo "adicionado com sucesso";
else
    echo "Erro!por favor,consulte um adm";
?>
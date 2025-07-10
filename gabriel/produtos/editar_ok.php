<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

if (!isset($_POST["id_filmes"])) {
    die("Erro: id_filmes não enviado no formulário.");
}

$obj = new filmes();
$obj->setId_filmes($_POST["id_filmes"]);
$obj->setNome($_POST["nome"]);
$obj->setGenero($_POST["genero"]);
$obj->setClassificacao_etaria($_POST["classificacao_etaria"]);
$obj->setAno_lancamento($_POST["ano_lancamento"]);
$obj->setTrilha_sonora($_POST["trilha_sonora"]);

$objDAO = new filmesDAO();
$retorno = $objDAO->editar($obj);

if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");

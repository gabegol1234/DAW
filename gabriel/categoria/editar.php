<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$id = $_GET["id"];
$objDAO = new categoriasDAO();
$retorno = $objDAO->retornarUm($id);
?>


<!DOCTYPE html>
<html lang="en">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="editar_ok.php" method="post">
         id_categoria:
        <br>
        <input type="text" name="id_categoria" value="<?= isset($retorno["id_categoria"]) ? $retorno["id_categoria"] : '' ?>" />
        <br>
       
        nome:
        <br>
        <input type="text" name="nome" value="<?= isset($retorno["nome"]) ? $retorno["nome"] : '' ?>" />
        <br>
       
        <br>
        <input type="hidden" name="id" value="<?= $id ?>" />
        <input type="submit" value="Salvar" />
    </form>
</body>

</html>
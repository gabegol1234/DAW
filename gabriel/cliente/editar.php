<?php
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";
$id = $_GET["id"];
$objDAO = new clientesDAO();
$retorno = $objDAO->retornarUm($id);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="editar_ok.php" method="post">
        nome:
        <input type="text" name="nome" value="<?=$retorno["nome"]?>" />
        <br>
        <input type="hidden" name="clientes" value="<?=$retorno["idclientes"]?>" />
        senha:
        <input type="text" name="senha" value="<?=$retorno["senha"]?>" />
        <br>
        usuario:
        <input type="text" name="usuario"value="<?=$retorno["usuario"]?>" />
        <br>
        contato:
        <input type="number" name="contato" value="<?=$retorno["contato"]?>"/>
        <br>
        cpf:
        <input type="text" name="cpf" value="<?=$retorno["cpf"]?>"/>
        <button type="submit">enviar</button>
        <br>
</body>

</html>
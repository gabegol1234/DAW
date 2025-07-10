<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$id = $_GET["id"];
$objDAO = new filmesDAO();
$retorno = $objDAO->retornarUm($id);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Oferta</title>
</head>

<body>
    <h1>Editar Produto em Oferta</h1>
    
    <form action="ofertar_ok.php" method="post">
        <input type="hidden" name="id_filmes" value="<?= $retorno["id_filmes"] ?? '' ?>" />

        oferta:
        <input type="number" name="ofertar" value="<?= $retorno["ofertar"] ?? '' ?>" />
        <br>

        <button type="submit">Salvar Oferta</button>
    </form>
</body>

</html>

<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$idFilme = $_GET["idFilme"];
$objFilmesDAO = new FilmesDAO();
$retorno = $objFilmesDAO->retornarUm($idFilme);

include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";
$objcategorias = new CategoriasDAO();
$categorias = $objcategorias->listar(); 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>
    <form action="editar_ok.php" method="post">
        <input type="hidden" name="idFilme" value="<?= $retorno["idFilme"] ?>" />
        
        Nome:
        <input type="text" name="nome" value="<?= $retorno["nome"] ?>" />
        <br>

        genero:
        <input type="text" name="genero" value="<?= $retorno["genero"] ?>" />
        <br>

        classificação_etaria:
        <input type="text" name="classificacaoEtaria" value="<?= $retorno["classificacaoEtaria"] ?>" />
        <br>

        trilha_sonora:
        <input type="text" name="trilhaSonora" value="<?= $retorno["trilhaSonora"] ?>" />
        <br>

       
        ano lançamento:
        <input type="date" name="anoLancamento" value="<?= $retorno["anoLancamento"] ?>" />
        <br>
        Genero:
        <select name="genero">
            <?php
            foreach($categorias as $linha){
                if($linha["id"] == $retorno["idCategoria"])
                echo "<option selected value='".$linha["idCategoria"]."'>".$linha['nome']."</option>";
                else
                    echo"<option value='".$linha["idCategoria"]."'>".$linha["nome"]."</option>";
            }
            ?>
      

        <button type="submit">Salvar</button>
    </form>
</body>

</html>
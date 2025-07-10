<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
$id = $_GET["id"];
$objDAO = new filmesDAO();
$retorno = $objDAO->retornarUm($id);

include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";
$objcategorias = new categoriasDAO();
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
        <input type="hidden" name="id_filmes" value="<?= $retorno["id_filmes"] ?>" />
        
        Nome:
        <input type="text" name="nome" value="<?= $retorno["nome"] ?>" />
        <br>

        genero:
        <input type="text" name="genero" value="<?= $retorno["genero"] ?>" />
        <br>

        classificação_etaria:
        <input type="text" name="classificacao_etaria" value="<?= $retorno["classificacao_etaria"] ?>" />
        <br>

        trilha_sonora:
        <input type="text" name="trilha_sonora" value="<?= $retorno["trilha_sonora"] ?>" />
        <br>

       
        ano lançamento:
        <input type="date" name="ano_lancamento" value="<?= $retorno["ano_lancamento"] ?>" />
        <br>
        Genero:
        <select name="genero">
            <?php
            foreach($categorias as $linha){
                if($linha["id"] == $retorno["id_categoria"])
                echo "<option selected value='".$linha["id"]."'>".$linha['nome']."</option>";
                else
                    echo"<option value='".$linha["id"]."'>".$linha["nome"]."</option>";
            }
            ?>
      

        <button type="submit">Salvar</button>
    </form>
</body>

</html>

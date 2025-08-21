<?php
    include_once "../class/categorias.class.php";
    include_once "../class/categoriasDAO.class.php";
    $objcategorias = new categoriasDAO();
    $categorias = $objcategorias->listar();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="inserir_ok.php" method="post" enctype="multipart/form-data">
        Nome:
        <input type="text" name="nome"/>
        <br>
        Preço:
        <input type="number" name="preco"/>
        <br>
        Genero:
        <select name="genero">
            <?php
                $con = mysqli_connect("localhost", "root", "", "gabriel_ecommerce");
                
                $categorias = mysqli_query($con, "SELECT * FROM categorias");

                while($cadaCategoria = mysqli_fetch_assoc($categorias)) {
                    echo "<option value='".$cadaCategoria['idCategoria']."'>".$cadaCategoria['nome']."</option>";
                }
                
            ?>
        </select>
        <br>
        ClassificaçãoEtária:
        <input type="text" name="classificacaoEtaria"/>
        <br>
        anoLançamento:
        <input type="number" name="anoLancamento"/>
        <br>
        Descrição:
        <input type="text" name="descricao"/>
        <br>
        Duração:
        <input type="text" name="duracao"/>
        <br>
        trilhaSonora:
        <input type="text" name="trilhaSonora"/>
        <br>
        <input type="file" name="imagem[]" multiple />
        <button type="submit">enviar</button>
        <br>
        </form>
</body>
</html>
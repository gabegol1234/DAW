<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$objcategoriasDAO = new categoriasDAO();
$retorno = $objcategoriasDAO->listar();
/*
echo "<pre>";
print_r($retorno);
*/
if(isset($_POST["editarOK"]))
echo "<h2>Editado com sucesso!</h2>";
if(isset($_POST["editarErro"]))
echo "<h2>Erro ao editar!</h2>";

echo "<a href='inserir.php'>inserir</a><br>";
foreach($retorno as $linha){
    echo "id_categoria: ".$linha["id_categoria"];
    echo "<br/ >nome:" .$linha["nome"];
    echo "<br/>
        <a href='editar.php?id=".$linha["id_categoria"]."'>
        editar</a>
        <a href='excluir.php?id_categoria=".$linha["id_categoria"]."'>
        excluir</a>

        <br  /><br  />";
    }     


?>


<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/img.class.php";
include_once "../class/imgDAO.class.php";


$objcategoriasDAO = new categoriasDAO();
$categorias = $objcategoriasDAO->listar();

?>
<ul>
    <?php
    foreach($categorias as $linha){
        echo "<li><a href = 'listar.php?id". $linha["id_categoria"] ."'>" . $linha["nome"] . "</a></li>";
    }
    ?>
</ul>
<?php
$objfilmesDAO = new filmesDAO();
$objimagensDAO = new imgDAO();
$retorno = $objfilmesDAO->listar(" ORDER BY id_filmes DESC LIMIT 3");
$objimagemDAO = new imgDAO();
foreach($retorno as $linha){

}

if ($retorno && is_array($retorno)) {
    foreach ($retorno as $linha) {
?>

<div>

    <h3><?=$linha["nome"]?></3>
    <h4><?=$linha["preco"]?></4>
    <h5><?=$linha["categorias"]?></h5>
    <?php
    $retornoimg = $objimagensDAO->retornarUm($linha["id_filmes"]);
    if($retornoimg>0)
    echo "<img src='../img/".$retornoimg["nome"]."'/>";
     ?>
</div>
        <?php

    }}
        ?>


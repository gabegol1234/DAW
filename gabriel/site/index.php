<?php

session_start();
if(isset($_GET["carrinho"])){
    if(!isset($_SESSION["carrinho"])){
        $_SESSION["carrinho"] = [];
    }
    if(!in_array($_GET["id"], $_SESSION["carrinho"])){
        array_push($_SESSION["carrinho"], $_GET["id"]);
        echo "<h2>Adicionado ao carrinho</h2>";
    }
    else{
        echo "<h2>Produto já adicionado ao carrinho anteriormente</h2>";
    }
    print_r($_SESSION["carrinho"]);

}
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
        echo "<li><a href = 'listar.php?id=". $linha["id_categoria"] ."'>" . $linha["nome"] . "</a></li>";
    }
    ?>
    <li><a href="carrinho.php">Carrinho de Compras</a></li>
</ul>
<?php
$objfilmesDAO = new filmesDAO();
$objimagensDAO = new imgDAO();
$retorno = $objfilmesDAO->listar(" ORDER BY id_filmes DESC LIMIT 3");
$objimagemDAO = new imgDAO();


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
    echo "<img src='../imagens/".$retornoimg["nome"]."'/>";
     ?>
        <a href="?id=<?=$linha['id_filmes'];?>&carrinho">
        add ao carrinho
     </a>

</div>
        <?php

    }}
        ?>


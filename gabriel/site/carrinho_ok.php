<?php
session_start();
include_once "../class/vendas.class.php";
include_once "../class/filmes_has_vendas.class.php";
include_once "../class/filmes_has_vendasDAO.class.php";
include_once "../class/vendasDAO.class.php";
include_once "../class/filmesDAO.class.php"; 

$objVendas = new Vendas();
$objVendas->setIdCliente($_SESSION["idCliente"]);
$objVendas->setDataVenda(date("y-m-d"));
$objVendas->setPagamento($_POST["pagamento"]);
$objVendas->setEntrega($_POST["entrega"]);
$objVendas->setStatusVenda("nova compra");

$objVendasDAO = new VendasDAO();
$idUltimaVenda = $objVendasDAO->inserir($objVendas);
if ($idUltimaVenda > 0) {
    echo "venda inserida";

    $objFilmesHasVendas = new filmes_has_vendas();
    $objFilmesHasVendasDAO = new filmes_has_vendasDAO();

    foreach($_SESSION["carrinho"] as $cadaProdutoDoCarrinho) {

        $objFilmesHasVendas->setIdFilme($cadaProdutoDoCarrinho);
        $objFilmesHasVendas->setIdVenda($idUltimaVenda);

        $objFilmesHasVendasDAO->inserir($objFilmesHasVendas);
        
        // LINHA ABAIXO PARA NOTA FISCAL
        //$objfilme = $objFilmesHasVendasDAO->retornarUm($cadaProdutoDoCarrinho);
    }
} else {
    echo "erro";
}
<?php
session_start();
include_once "../class/vendas.class.php";
include_once "../class/filmes_has_venda.class.php";
include_once "../class/filmes_has_vendaDAO.class.php";
include_once "../class/vendasDAO.class.php";
$objVendas = new Vendas();
$objVendas->setId($_SESSION["id"]);
$objVendas->setData_venda(date("y-m-d"));
$objVendas->setpagamento($_POST["pagamento"]);
$objVendas->setEntrega($_POST["endereco"]);
$objVendas->setStatus_venda("nova compra");
$objDAO = new VendaDAO();
$retorno = $objDAO->inserir($objVendas);
if ($retorno > 0) {
    echo "venda inserida";

    $objVP = new filmes_has_produtos();
    $objVPDAO = new filme_has_venda_produtoDAO();
    $objVP->setId_filmes($retorno);

    foreach ($_SESSION["Carrinho"] as $linha) {
        $objVP->setId_filmes($linha);
        //pedir para o banco o preco 

        $objfilme = $objfilmesDAO->retornarUm($linha);
        $objVP->getPreco($objfilme["preco"]);

        $objVPDAO->inserir($objVP);
    }
} else {
    echo "erro";
}
?>
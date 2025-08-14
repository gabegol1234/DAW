<?php
session_start();

include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/img.class.php";
include_once "../class/imgDAO.class.php";

$objfilmesDAO = new filmesDAO();
$objimagensDAO = new imgDAO();

$carrinho = $_SESSION['carrinho'] ?? [];

if (empty($carrinho)) {
    echo "<p>Seu carrinho está vazio.</p>";
    exit;
}

$total = 0;
?>

<h2>Seu Carrinho</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Filme</th>
        <th>Quantidade</th>
        <th>Preço Unitário</th>
        <th>Subtotal</th>
        <th>Imagem</th>
    </tr>

<?php
foreach ($carrinho as $id_filme => $quantidade) {
    $filme = $objfilmesDAO->retornarUm($id_filme);
    if ($filme) {
        $subtotal = $filme['preco'] * $quantidade;
        $total += $subtotal;

        $imagem = $objimagensDAO->retornarUm($id_filme);
        $img_tag = "";
        if ($imagem > 0) {
            $img_tag = "<img src='../imagens/" . $imagem['nome'] . "' style='max-width:80px'/>";
        }

        echo "<tr>
            <td>{$filme['nome']}</td>
            <td>{$quantidade}</td>
            <td>R$ {$filme['preco']}</td>
            <td>R$ $subtotal</td>
            <td>$img_tag</td>
        </tr>";
    }
}
?>

<tr>
    <td colspan="3"><strong>Total:</strong></td>
    <td colspan="2"><strong>R$ <?=$total?></strong></td>
</tr>
</table>

<p><a href="finalizar_compra.php">Finalizar Compra</a></p>
<p><a href="index.php">Continuar Comprando</a></p>

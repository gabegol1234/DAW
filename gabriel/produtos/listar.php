<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/img.class.php";
include_once "../class/imgDAO.class.php";

$objfilmesDAO = new filmesDAO();
$objimagensDAO = new imgDAO();
$retorno = $objfilmesDAO->listar();

if (isset($_POST["editarOK"])) {
    echo "<h2>Editado com sucesso!</h2>";
}
if (isset($_POST["editarErro"])) {
    echo "<h2>Erro ao editar!</h2>";
}

if (isset($_POST["ofertaOK"])) {
    echo "<h2>Produto colocado em oferta com sucesso!</h2>";
}
if (isset($_POST["ofertaErro"])) {
    echo "<h2>Erro ao colocar produto em oferta!</h2>";
}

echo "<a href='inserir.php'>Inserir novo produto</a><br>";

/*echo "<pre>";
print_r($retorno);
echo "</pre>";*/

// Verifica se a variável $retorno está corretamente preenchida
if ($retorno && is_array($retorno)) {
    foreach ($retorno as $linha) {

        //mostrar img do produto
        $retornoimg = $objimagensDAO->retornarUm($linha["id_filmes"]);
        if($retornoimg>0) 
        echo "<img src='../imagens/".$retornoimg["nome"]."'>";

        // Verifica se as chaves 'genero' e 'nome' existem no array
        if (isset($linha["genero"]) && isset($linha["nome"])) {
            echo "Gênero: " . calcularGenero($linha["genero"]);
            echo "<br/>Nome: " . $linha["nome"];

            // Exibir classificação etária, se existir
            if (isset($linha["classificacao_etaria"])) {
                echo "<br/>Classificação Etária: " . $linha["classificacao_etaria"];
            }

            // Exibir ano de lançamento, se existir
            if (isset($linha["ano_lancamento"])) {
                echo "<br/>Ano de Lançamento: " . $linha["ano_lancamento"];
            }

            
            // Exibir ano de trilha sonora, se existir
            if (isset($linha["trilha_sonora"])) {
                echo "<br/>trilha_sonora: " . $linha["trilha_sonora"];
            }


            // Verificar se o campo 'em_oferta' está definido e se o produto está em oferta
            if (isset($linha["em_oferta"]) && $linha["em_oferta"] == 1) {
                echo "<br/>Produto em oferta!";
            } else {
                echo "<br/><a href='ofertar.php?id=" . $linha["id_filmes"] . "'>Colocar em oferta</a>";
            }

            echo "<br/><a href='editar.php?id=" . $linha["id_filmes"] . "'>Editar</a>";
            echo "<a href='excluir.php?genero=" . $linha["id_filmes"] . "'>Excluir</a>";
            echo "<br/><br/>";
        } else {
            echo "<p>Erro: Dados incompletos para o produto.</p>";
        }
    }
} else {
    echo "<p>Nenhum produto encontrado.</p>";
}
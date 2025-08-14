<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/img.class.php";
include_once "../class/imgDAO.class.php";
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$objfilmesDAO = new filmesDAO();
$objimagensDAO = new imgDAO();
$objcategoriasDAO = new categoriasDAO();

// Captura busca e categoria selecionada
$busca = isset($_GET['q']) ? trim($_GET['q']) : "";
$categoria = isset($_GET['categoria']) ? intval($_GET['categoria']) : 0;

// Se tiver busca ou categoria, filtra; senão, lista todos
if ($busca != "" || $categoria > 0) {
    $retorno = $objfilmesDAO->buscarFiltrado($busca, $categoria);
} else {
    $retorno = $objfilmesDAO->listar();
}

// Lista categorias para o select
$listaCategorias = $objcategoriasDAO->listar();

// Formulário de busca + filtro
echo '<form method="GET" action="">
        <input type="text" name="q" placeholder="Buscar produto..." value="'.htmlspecialchars($busca).'">
        <select name="categoria">
            <option value="0">Todas as categorias</option>';
            if ($listaCategorias && is_array($listaCategorias)) {
                foreach ($listaCategorias as $cat) {
                    $sel = ($categoria == $cat["id_categoria"]) ? "selected" : "";
                    echo "<option value='{$cat["id_categoria"]}' $sel>{$cat["nome"]}</option>";
                }
            }
echo '  </select>
        <button type="submit">Filtrar</button>
      </form><br>';

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

// Listagem de produtos
if ($retorno && is_array($retorno)) {
    foreach ($retorno as $linha) {

        //mostrar img do produto
        $retornoimg = $objimagensDAO->retornarUm($linha["id_filmes"]);
        if($retornoimg>0) 
            echo "<img src='../imagens/".$retornoimg["nome"]."'>";

        if (isset($linha["genero"]) && isset($linha["nome"])) {
            echo "Gênero: " . calcularGenero($linha["genero"]);
            echo "<br/>Nome: " . $linha["nome"];

            if (isset($linha["classificacao_etaria"])) {
                echo "<br/>Classificação Etária: " . $linha["classificacao_etaria"];
            }
            if (isset($linha["ano_lancamento"])) {
                echo "<br/>Ano de Lançamento: " . $linha["ano_lancamento"];
            }
            if (isset($linha["trilha_sonora"])) {
                echo "<br/>Trilha sonora: " . $linha["trilha_sonora"];
            }

            if (isset($linha["em_oferta"]) && $linha["em_oferta"] == 1) {
                echo "<br/>Produto em oferta!";
            } else {
                echo "<br/><a href='ofertar.php?id=" . $linha["id_filmes"] . "'>Colocar em oferta</a>";
            }

            echo "<br/><a href='editar.php?id=" . $linha["id_filmes"] . "'>Editar</a>";
            echo "<a href='excluir.php?id_filmes=" . $linha["id_filmes"] . "'>Excluir</a>";
            echo "<br/><br/>";
        } else {
            echo "<p>Erro: Dados incompletos para o produto.</p>";
        }
    }
} else {
    echo "<p>Nenhum produto encontrado.</p>";
}
?>

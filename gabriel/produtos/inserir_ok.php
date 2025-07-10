<?php
//echo"<pre>";
//print_r($_POST);
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/img.class.php";
include_once "../class/imgDAO.class.php";



$obj = new filmes();
$obj->setNome($_POST["nome"]);
$obj->setPreco($_POST["preco"]);
$obj->setGenero($_POST["genero"]);
$obj->setClassificacao_etaria($_POST["classificacao_etaria"]);
$obj->setAno_lancamento($_POST["ano_lancamento"]);
$obj->setDescricao($_POST["descricao"]);
$obj->setDuracao($_POST["duracao"]);
$obj->setTrilha_sonora($_POST["trilha_sonora"]);

$objDAO = new filmesDAO();
$retorno = $objDAO->inserir($obj);




$obj = new img();
$obj->setId_filmes($retorno);
$objDAO = new imgDAO();

for($i=0; $i<count($_FILES["imagem"]["name"]); $i++){
    echo "oiiii";
    $nome = $_FILES["imagem"]["name"][$i];
    $nomeTmp = $_FILES["imagem"]["tmp_name"][$i];
    $diretorio = "../imagens/".$nome;
    if(move_uploaded_file($nomeTmp, $diretorio)){
        echo "ola";
        $obj->setNome($nome);
        $objDAO->inserir($obj);
    }

}

if($retorno){
    //header("location:listar.php?editarOk");
    echo "oi";
}
else{
    header("location:listar.php?editarErro");
  echo "<br>tapa no teclado";
}
?>
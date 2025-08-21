<?php
//echo"<pre>";
//print_r($_POST);
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/imagens.class.php";
include_once "../class/imagensDAO.class.php";



$obj = new filmes();
$obj->setNome($_POST["nome"]);
$obj->setPreco($_POST["preco"]);
$obj->setGenero($_POST["genero"]);
$obj->setClassificacaoEtaria($_POST["classificacaoEtaria"]);
$obj->setAnoLancamento($_POST["anoLancamento"]);
$obj->setDescricao($_POST["descricao"]);
$obj->setDuracao($_POST["duracao"]);
$obj->setTrilhaSonora($_POST["trilhaSonora"]);

$objDAO = new filmesDAO();
$retorno = $objDAO->inserir($obj);




$obj = new imagens();
$obj->setIdFilme($retorno);
$objDAO = new imagensDAO();

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
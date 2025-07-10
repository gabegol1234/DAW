<?php
include_once "clientes.class.php"; 
include_once "filmes.class.php";

function calcularGenero($idGenero) {
    $con = mysqli_connect("localhost", "root", "", "gabriel_ecommerce");
    
    $nomeGenero = mysqli_query($con, "SELECT nome FROM categorias WHERE id_categoria = '".$idGenero."'");

    while($cadaNome = mysqli_fetch_assoc($nomeGenero)) {
        return $cadaNome['nome'];
    }
}

class filmesDAO
{
   private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=gabriel_ecommerce",
            "root",
            ""
        );
    }

    public function listar($complemento= "")
    {
        $sql = $this->conexao->prepare("SELECT filmes.*,categorias.nome as categorias FROM filmes INNER JOIN categorias ON filmes.genero=categorias.id_categoria ".$complemento);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function inserir(filmes $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO filmes
            (nome,genero,classificacao_etaria,ano_lancamento,descricao,duracao,trilha_sonora)
            VALUES
            (:nome,:genero,:classificacao_etaria,:ano_lancamento,:descricao,:duracao,:trilha_sonora)"
        );
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":genero", $obj->getGenero());
        $sql->bindValue(":classificacao_etaria", $obj->getClassificacao_etaria());
        $sql->bindValue(":ano_lancamento", $obj->getAno_lancamento());
        $sql->bindValue(":descricao", $obj->getDescricao());
        $sql->bindValue(":duracao", $obj->getDuracao());
        $sql->bindValue(":trilha_sonora", $obj->getTrilha_sonora());
        $sql->execute();
        return $this->conexao->lastInsertId();

    }

    public function excluir($id)
    {
        $sql = $this->conexao->prepare("DELETE FROM filmes WHERE id_filmes = :id");
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }

    public function retornarUm($id_filmes)
    {
        $sql = $this->conexao->prepare("SELECT * FROM filmes WHERE id_filmes = :id");
        $sql->bindValue(":id", $id_filmes);
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(filmes $filmes)
    {
        $sql = $this->conexao->prepare("
            UPDATE filmes SET
            nome = :nome,
            genero = :genero,
            classificacao_etaria = :classificacao_etaria,
            ano_lancamento = :ano_lancamento,
            descricao = :descricao,
            duracao = :duracao,
            trilha_sonora = :trilha_sonora
            WHERE id_filmes = :id_filmes
        ");

        $sql->bindValue(":id_filmes", $filmes->getId_filmes());
        $sql->bindValue(":nome", $filmes->getNome());
        $sql->bindValue(":genero", $filmes->getGenero());
        $sql->bindValue(":classificacao_etaria", $filmes->getClassificacao_etaria());
        $sql->bindValue(":ano_lancamento", $filmes->getAno_lancamento());
        $sql->bindValue(":descricao", $filmes->getDescricao());
        $sql->bindValue(":duracao", $filmes->getDuracao());
        $sql->bindValue(":trilha_sonora", $filmes->getTrilha_sonora());

        return $sql->execute();
    }

    // ✅ Adicionado o método ofertar
    public function ofertar(filmes $filmes)
    {
        $sql = $this->conexao->prepare("
            UPDATE filmes SET
            ofertar = :ofertar
            WHERE id_filmes = :id_filmes
        ");
        
        $sql->bindValue(":ofertar", $filmes->getOfertar());
        $sql->bindValue(":id_filmes", $filmes->getId_filmes());
        
        return $sql->execute();
    }
}
?>

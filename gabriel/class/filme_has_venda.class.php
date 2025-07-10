<?php
class filmes_has_produtos{
    private $id_filmes;
    private $id_vendas;
    private $preco;



    public function setId_filmes($valor)
    {
        $this->id_filmes = $valor;
    }
    public function getId_filmes()
    {
        return $this->id_filmes;
    }
    public function setId_vendas($valor)
    {
        $this->id_vendas = $valor;
    }

    public function getId_vendas()
    {
        return $this->id_vendas;
    }
    public function setPreco($valor)
    {
        $this->preco = $valor;
    }
    public function getPreco()
    {
        return $this->preco;
    }
}

?>
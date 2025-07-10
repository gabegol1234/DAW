<?php
    class filmes{
        private $id_filmes;
        private $nome;
        private $preco;
        private $genero;
        private $classificacao_etaria;
        private $ano_lancamento;
        private $descricao;
        private $duracao;
        private $trilha_sonora;
        private $ofertar;
        

        public function getId_filmes(){
            return $this->id_filmes;
        }
        public function setId_filmes($valor){
            $this->id_filmes = $valor;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($valor){
            $this->nome = $valor;
        }
        public function getPreco(){
            return $this->preco;
        }
        public function setPreco($valor){
            $this->preco = $valor;
        }
        public function getGenero(){
            return $this->genero;
        }
        public function setGenero($valor){
            $this->genero = $valor;
        }
        public function getClassificacao_etaria(){
            return $this->classificacao_etaria;
        }
        public function setClassificacao_etaria($valor){
            $this->classificacao_etaria = $valor;
        }
        public function getAno_lancamento(){
            return $this->ano_lancamento;
        }
        public function setAno_lancamento($valor){
            $this->ano_lancamento= $valor;
        }
        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($valor){
            $this->descricao = $valor;
        }
        public function getDuracao(){
            return $this->duracao;
        }
        public function setDuracao($valor){
            $this->duracao= $valor;
        }
        public function getTrilha_sonora(){
            return $this->trilha_sonora;
        }
        public function setTrilha_sonora($valor){
            $this->trilha_sonora= $valor;
        }
        public function getOfertar(){
            return $this->ofertar;
        }
        public function setOfertar($valor){
            $this->ofertar= $valor;
        }
          


        
    }

?>
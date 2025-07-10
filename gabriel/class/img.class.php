<?php
    class img {
        private $id_imagem;
        private $nome;
        private $id_filmes;

        public function getId_imagem(){
            return $this->id_imagem;
        }
        public function setId_imagem($valor){
            $this->id_imagem = $valor;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($valor){
            $this->nome = $valor;
        }

        public function getId_filmes(){
            return $this->id_filmes;
        }
        public function setId_filmes($valor){
            $this->id_filmes = $valor;
        }
    }
?>

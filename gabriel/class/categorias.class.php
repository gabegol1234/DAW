<?php
    class categoria{
        private $id_categoria;
        private $nome;
       
        

        public function getId_categoria (){
            return $this->id_categoria;
        }
        public function setId_categoria($valor){
            $this->id_categoria = $valor;
        }
        public function getnome(){
            return $this->nome;
        }
        public function setnome($valor){
            $this->nome = $valor;
        }
        

        
    }

?>
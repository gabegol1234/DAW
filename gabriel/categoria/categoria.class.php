<?php
    class categoria{
        private $id_categoria;
        private $açao;
        private $romance;
        private $comedia;
        private $aventura;
        private $drama;
        

        public function getId_categoria (){
            return $this->id_categoria;
        }
        public function setId_categoria($valor){
            $this->id_categoria = $valor;
        }
        public function getAçao(){
            return $this->açao;
        }
        public function setAçao($valor){
            $this->açao = $valor;
        }
        public function getRomance(){
            return $this->romance;
        }
        public function setRomance($valor){
            $this->romance = $valor;
        }
        public function getCmedia(){
            return $this->comedia;
        }
        public function setComedia($valor){
            $this->comedia = $valor;
        }
        public function getAventura(){
            return $this->aventura;
        }
        public function setAventura($valor){
            $this->aventura = $valor;
        }
        public function getDrama(){
            return $this->drama;
        }
        public function setDrama($valor){
            $this->drama = $valor;
        }
        


        
    }

?>
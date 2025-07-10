<?php
    class produtos{
        private $id_categoria;
        private $ação;
        private $romance;
        private $comedia;
        private $aventura;
        private $drama;
        

        public function getId_ (){
            return $this->id_categoria;
        }
        public function setId_categoria($valor){
            $this->id_categoria = $valor;
        }
        public function getAção(){
            return $this->açao;
        }
        public function setAção($valor){
            $this->açao = $valor;
        }
        public function getRomance(){
            return $this->romance;
        }
        public function setRomance($valor){
            $this->romance = $valor;
        }
        public function getComedia(){
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
<?php
    class Quadrado{
        private $id;
        private $lado;
        private $cor;

        
        public function __construct($id, $ld, $cr){
            
            $this->setId($id);
            $this->setLado($ld);
            $this->setCor($cr);
        }

        public function getLado(){ return $this->lado; }
        public function setLado($ld){ $this->lado = $ld;}

        public function getCor(){ return $this->cor; }
        public function setCor($cr){ $this->cor = $cr; }
        
        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id;}

        public function area(){
            return $this->lado * $this->lado;
        }

        public function perimetro(){
            return $this->lado * 4;
        }

        public function diagonal(){
            return $this->lado * 1.4;
        }

        public function insere(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor) 
            VALUES(:lado, :cor)');

            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());

            return $stmt->execute(); 
        }

        public function editar($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE quadrado SET lado = :lado, cor = :cor
            WHERE id = :id');

            $stmt->bindValue(':id', $this->setId($this->id));
            $stmt->bindValue(':lado', $this->setLado($this->lado));
            $stmt->bindValue(':cor', $this->setCor($this->cor));

            return $stmt->execute();
        }

        function excluir($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
            $stmt->bindValue(':id', $id);
            
            return $stmt->execute();
        }

        public function __toString(){
            return "[Quadrado]<br>Lado: ".$this->getLado().
            "<br>Cor: ".$this->getCor().
            "<br>Área: ".$this->area().
            "<br>Perímetro: ".$this->perimetro().
            "<br>Diagonal: ".$this->diagonal();
        }
    }
?>
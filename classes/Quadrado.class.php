<?php
    class Quadrado{
        private $id;
        private $lado;
        private $cor;
        private $quad_idTabuleiro;
        
        public function __construct($id, $ld, $cr, $idT){
            
            $this->setId($id);
            $this->setLado($ld);
            $this->setCor($cr);
            $this->setIdT($idT);
        }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id;}

        public function getLado(){ return $this->lado; }
        public function setLado($ld){ $this->lado = $ld;}

        public function getCor(){ return $this->cor; }
        public function setCor($cr){ $this->cor = $cr; }
        
        public function getIdT(){ return $this->quad_idTabuleiro; }
        public function setIdT($idT){ $this->quad_idTabuleiro = $idT;}

        public function area(){
            return $this->lado * $this->lado;
        }

        public function perimetro(){
            return $this->lado * 4;
        }

        public function diagonal(){
            return $this->lado * 1.4;
        }

        public static function insere($lado, $cor, $quad_idTabuleiro){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor, quad_idTabuleiro) 
            VALUES(:lado, :cor, :quad_idTabuleiro)');

            $stmt->bindValue(':lado', $lado);
            $stmt->bindValue(':cor', $cor);
            $stmt->bindValue(':quad_idTabuleiro', $quad_idTabuleiro);

            return $stmt->execute(); 
        }

        public static function editar($id, $lado, $cor, $quad_idTabuleiro){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE quadrado SET lado = :lado, cor = :cor, quad_idTabuleiro = :quad_idTabuleiro
            WHERE id = :id');

            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':lado', $lado);
            $stmt->bindValue(':cor', $cor);
            $stmt->bindValue(':quad_idTabuleiro', $quad_idTabuleiro);

            return $stmt->execute();
        }

        public static function excluir($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
            $stmt->bindValue(':id', $id);
            
            return $stmt->execute();
        }

        public static function listar($cnst = 0, $procurar = ""){
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM quadrado";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE lado like :procurar"; $procurar .="%"; break;
                    case(2): $sql .= " WHERE cor like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " WHERE quad_idTabuleiro = :procurar"; break;
                }
            $stmt = $pdo->prepare($sql);
            if ($cnst > 0)
                $stmt->bindValue(':procurar', $procurar, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function desenha(){
            $x = "<div style='height: ".$this->getLado()."vw; width: ".$this->getLado()."vw; background-color:".$this->getCor().";'></div>";
            return $x;
        }

        public function __toString(){
            return "<br>[Quadrado]<br>Lado: ".$this->getLado().
            "<br>Cor: ".$this->getCor().
            "<br>Área: ".$this->area().
            "<br>Perímetro: ".$this->perimetro().
            "<br>Diagonal: ".$this->diagonal();
        }
    }
?>
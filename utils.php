<?php
require_once "classes/Quadrado.class.php";
require_once "classes/Tabuleiro.class.php";

function exibir($chave, $dados){
    $str = 0;
    foreach($dados as $linha){
        // if () {
        //     # code...
        // }
        $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
    }
    return $str;
}

function lista_tabuleiro($idTabuleiro){
    $tab = new Tabuleiro("","");
    $lista = $tab->buscar($idTabuleiro);
    return exibir(array('idTabuleiro', 'idTabuleiro'), $lista);
}
?>
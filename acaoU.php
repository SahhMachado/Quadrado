<?php  
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
require_once("classes/Usuario.class.php");

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : 0;
        
        $user = new Usuario("", "", "", "");
        $resultado = $user->excluir($idUsuario);
        header("location:showUs.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

        try{
        if ($idUsuario == 0){
            $user = new Usuario("", $_POST['nome'], $_POST['user'], $_POST['senha']);      
            $resultado = $user->insere();
            header("location:showUs.php");
        }else {
            $user = new Usuario($_POST['idUsuario'], $_POST['nome'], $_POST['user'], $_POST['senha']);
            $resultado = $user->editar();
        }    
        header("location:showUs.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Usuario.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}

function buscarDados($idUsuario){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM usuario WHERE idUsuario = $idUsuario");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['idUsuario'] = $linha['idUsuario'];
        $dados['nome'] = $linha['nome'];
        $dados['user'] = $linha['user'];
        $dados['senha'] = $linha['senha'];
    }
    return $dados;
}
?>
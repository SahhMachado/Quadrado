<!DOCTYPE html>
<?php
    $title = "Quadrado";
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once "classes/Quadrado.class.php";
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
    <style>
        body{
            background-color: #e5ddee;
            font-family: Arial, Helvetica, sans-serif;
        }

        button{
            background-color: #9178af;
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }

        header{
            background-image: url("img/header1.jpg");
            padding: 20px;
            font-weight: bold;
        }

        input{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
        }

        .container{
            margin: 20px;
        }

        .tab{
            border: none;
            background-color: #b4a0cd;
        }

        td{
            padding-right: 15px;
        }

        a{
            text-decoration: none;
            color: black;
        }

        a:hover{
            color: #b4a0cd;
        }
    </style>
</head>
<body>
    <header>
        <?php
        include_once "menu.php";
        ?>
    </header>
<div>
    <div class="container">
        <form method="post">
        <h3>Procurar Quadrado:</h3><br>
        <input type="text" name="procurar" id="procurar" size="25" placeholder="pesquisar"
        value="<?php echo $procurar;?>"><br><br>
    <button name="acao" id="acao" type="submit">Procurar</button>
    <br><br>
    <fieldset>
    <p> Ordernar e pesquisar por:</p><br>
        <form method="post" action="">
            <input type="radio" name="cnst" value="1" <?php if ($cnst == "1") echo "checked" ?>> Lado<br>
            <input type="radio" name="cnst" value="2" <?php if ($cnst == "2") echo "checked" ?>> Cor<br>
            <input type="radio" name="cnst" value="3" <?php if ($cnst == "3") echo "checked" ?>> ID Tabuleiro<br>
    <br><br>
    </form>
<table class="tab">
            <tr>
                <td><b>Lado(cm)</b></td>
                <td><b>Cor</b></td>
                <td><b>ID Tabuleiro</b></td>
                <td><b>Listar</b></td>
                <td><b>Editar</b></td>
                <td><b>Excluir</b></td>
    </tr> 
    <tr>
    <?php
        $lista = Quadrado::listar($cnst, $procurar);
        foreach ($lista as $linha) {

        $cor = str_replace("#","%23",$linha['cor']);
    ?>

            <td><?php echo $linha['lado'];?></td>
            <td><?php echo $linha['cor'];?></td>
            <td><?php echo $linha['quad_idTabuleiro'];?></td>   
            
            <td><a href='listar.php?lado=<?php echo $linha['lado'];?>&cor=<?php echo $cor;?>'><img src='img/listar.svg'></a></td>
            <td><a href='cad.php?acao=editar&id=<?php echo $linha['id'];?>'><img src='img/edit.svg'></a></td>
            <td><?php echo " <a href=javascript:excluirRegistro('acao.php?acao=excluir&id={$linha['id']}')>
            <img src='img/excluir.svg'></a><br>"; ?></td>
        </tr>   
        <?php } ?>    
    </table>
    </fieldset>
    </form>
    </div>
    <br>
</body>
</html>
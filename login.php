<?php

session_start();

?>
<!DOCTYPE html>
<?php
    $title = "Login";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $user = isset($_POST['user']) ? $_POST['user'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : 0;
    require_once "conf/Conexao.php";
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <style>
        body{
            background-color: #e5ddee;
            margin: 20px;
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
        <h3>Insira seus dados</h3><hr>
            <form method="post" action="login.php?acao=login">
                
            <p>Login:</p>
                <input required="true" name="user" id="user" type="text" required="true" placeholder="Digite o login"
                value="<?php echo $user ?>"><br>    
            
            <p>Senha:</p>
                <input required="true" name="senha" id="senha" type="text" required="true" placeholder="Digite a senha" 
                value="<?php echo $senha ?>"><br>    
            <br>
            <br>
                <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br> 
            <?php
            if($acao == 'login'){
                require_once "classes/Usuario.class.php";
               
                if (Usuario::efetuaLogin($user, $senha) == true){
                    echo "Login efetuado!";
                }else {
                echo "Erro";
            }
        }
            ?>
</body>
</html>
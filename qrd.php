<!DOCTYPE html>
<?php
    $title = "Quadrado";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
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

        .square{
            height: <?php echo $lado?>vw;
            width: <?php echo $lado?>vw;
            background-color: <?php echo $cor?>;
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
    <br>
    <fieldset>
        <?php  
            if ($acao = "salvar") {
                include_once "classes/Quadrado.class.php";
                $quad = new Quadrado("", $lado, $cor);
                echo $quad;
            }
            ?>
            <hr>
            <div class = "square"></div>
    </fieldset>
    <br>
        <button><a href="criarQ.php">Voltar</a></button>
</body>
</html>
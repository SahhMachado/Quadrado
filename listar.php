<!DOCTYPE html>
<?php
    $title = "Quadrado";
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $quad_idTabuleiro = isset($_GET['quad_idTabuleiro']) ? $_GET['quad_idTabuleiro'] : "";
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

        .div{
            margin-top: 100px;
            background-color:  #b4a0cd;
        }

        a{
            text-decoration: none;
            color: black;
        }

        .seta{
            width: 30px;
        }

        a:hover{
            color: #b4a0cd;
        }
    </style>
</head>
<body>
    <br>
    <div class="div">
        <center>
        <br><br><br>
        <?php  
            if ($acao = "salvar") {
                include_once "classes/Quadrado.class.php";
                $quad = new Quadrado("", $lado, $cor, $quad_idTabuleiro);
                echo $quad->desenha();
                echo $quad;
            }
            ?>
            <br>
            <br>
            <a href="show.php"><img src="img/arrow.svg" alt="" class="seta"></a>
            <br><br><br>
        </center>
    </div>
            <!-- <div class = "square"></div> -->
    </fieldset>
    <br>
</body>
</html>
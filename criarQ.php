<!DOCTYPE html>
<?php
    $title = "Quadrado";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";

    include_once "acao.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
}
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
    <br>
        <h3>Insira os dados para gerar um Quadrado</h3><hr>
            <form method="post" action="qrd.php">
                
            <p>Lado:</p>
                <input require="true" type="text" name="lado" id="lado" placeholder="Digite o tamanho do lado"><br>

            <p>Cor:</p>
                <input required="true" name="cor" id="cor" type="color" required="true" placeholder="Digite a cor"><br><br>         
            <hr>
            <br>
                <button name="acao" value="salvar" id="acao" type="submit">Criar</button>
            </form>
            <br> 
</body>
</html>
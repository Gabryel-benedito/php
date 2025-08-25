<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Processa Post</title>
</head>

<body>
    <?php

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];
    $faixa = $_POST["faixa"];


    if (empty($nome)) {
        echo "O campo Nome não foi preenchido!<br>";
    } else {
        echo "Nome: $nome<br>";
    }

    if (empty($email)) {
        echo "O campo E-mail não foi preenchido!<br>";
    } else {
        echo "E-mail: $email<br>";
    }

    if (empty($idade)) {
        echo "O campo Idade não foi preenchido!<br>";
    } else {
        echo "Idade: $idade<br>";
    }


    if (empty($faixa)) {
        echo "O campo Faixa Etária não foi preenchido!<br>";
    } else {
        echo "Faixa Etária: $faixa<br>";
    }

        
    ?>
</body>

</html>
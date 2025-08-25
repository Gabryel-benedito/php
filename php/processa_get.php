<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>

<body>

    <?php

    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $idade = $_GET["idade"];
    $curso = $_GET["curso"];

    echo "Nome: " . $nome . "<br>";
    echo "E-mail: " . $email . "<br>";
    echo "Idade: " . $idade . "<br>";
    echo "Curso: " . $curso . "<br>";
    ?>


</body>

</html>
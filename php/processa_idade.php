<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idade</title>
</head>

<body>

    <?php

    $idade = $_POST["idade"];
    $faixa = $_POST["faixa"];


    if (empty($idade) || empty($faixa)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }


    $idade = (int)$idade;


    $mensagem = "";


    switch ($faixa) {
        case "bebe":
            if ($idade <= 2) {
                $mensagem = "Correto! A idade $idade anos corresponde à faixa Bebê.";
            } else {
                $mensagem = "Incorreto! Bebê deve ter até 2 anos, mas você informou $idade anos.";
            }
            break;

        case "crianca":
            if ($idade > 2 && $idade <= 12) {
                $mensagem = "Correto! A idade $idade anos corresponde à faixa Criança.";
            } else {
                $mensagem = "Incorreto! Criança deve ter entre 3 e 12 anos, mas você informou $idade anos.";
            }
            break;

        case "adolescente":
            if ($idade > 12 && $idade <= 18) {
                $mensagem = "Correto! A idade $idade anos corresponde à faixa Adolescente.";
            } else {
                $mensagem = "Incorreto! Adolescente deve ter entre 13 e 18 anos, mas você informou $idade anos.";
            }
            break;

        case "adulto":
            if ($idade > 18) {
                $mensagem = "Correto! A idade $idade anos corresponde à faixa Adulto.";
            } else {
                $mensagem = "Incorreto! Adulto deve ter mais de 18 anos, mas você informou $idade anos.";
            }
            break;

        default:
            $mensagem = "Faixa etária inválida.";
            break;
    }


    echo $mensagem;
    ?>


</body>

</html>
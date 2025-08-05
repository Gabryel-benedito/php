<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aula php</title>
</head>

<body>
    <?php
    $a = 3;
    $b = 15;
    $c = 7;

    if ($a < $b) {
        if ($a < $c) {
            echo "A variável A possui o menor valor e vale " . $a . "<br>";

            if ($b < $c) {
                echo "A variável B possui o segundo menor valor e vale " . $b . "<br>";
                echo "A variável C possui o maior valor e vale " . $c . "<br>";
            } else {
                echo "A variável C possui o segundo menor valor e vale " . $c . "<br>";
                echo "A variável B possui o maior valor e vale " . $b . "<br>";
            }
        } else {
            echo "A variável C possui o menor valor e vale " . $c . "<br>";
            echo "A variável A possui o segundo menor valor e vale " . $a . "<br>";
            echo "A variável B possui o maior valor e vale " . $b . "<br>";
        }
    } else if ($b < $c) {
        echo "A variável B possui o menor valor e vale " . $b . "<br>";

        if ($c < $a) {
            echo "A variável C possui o segundo menor valor e vale " . $c . "<br>";
            echo "A variável A possui o maior valor e vale " . $a . "<br>";
        } else {
            echo "A variável A possui o segundo menor valor e vale " . $a . "<br>";
            echo "A variável C possui o maior valor e vale " . $c . "<br>";
        }
    } else {
        echo "A variável C possui o menor valor e vale " . $c . "<br>";
        echo "A variável B possui o segundo menor valor e vale " . $b . "<br>";
        echo "A variável A possui o maior valor e vale " . $a . "<br>";
    }

    

    ?>





</body>

</html>
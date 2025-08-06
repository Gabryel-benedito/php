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


    <?php

        $a = 3;
        $b = 15;
        $c = 7;
        $v = 0;


        for ($i= $a; $i >=1 ; $i--) { 
            if($a  % $i == 0 ){
                if($v >= 3){
                    echo "O número não é primo";

                    $i = 0;
                }
            }
        }
            
        if($v <= 2){
            echo "<br> O número " . $a . " é primo";
        }   


         echo "<br><br> <h1>Fatorial da varaiavel C </h1><br>";

        $res = 1;

        for( $i = 1; $i <= $c; $i++) {
            $res = $res * $i;
            echo "<br> $c x $i = " . $res;
            

        }

        echo "<br><br>  O fatorial de <strong>" . $c . " é " . $res  . "</strong><br>";
    

    ?>



    <?php 

   
    ?>




</body>

</html>

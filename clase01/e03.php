<?php
    /*
    Aplicación No 3 (Obtener el valor del medio)
    Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
    el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
    variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. Ejemplo 1: $a
    = 6; $b = 9; $c = 8; => se muestra 8.
    Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
    */

    /*
    1   5   3     el 3 es del medio
    5   1   5   no hay numero del medio
    3  5   1     el 3 es del medio
    3   1   5    el 3 es del medio
    5   3   1    el 3 es del medio
    1  5  1    no hay numero del medio
    */

    function findTheMiddleValue($arg_1, $arg_2, $arg_3) {
        if ($arg_1 > $arg_2 && $arg_1 < $arg_3 || $arg_1 < $arg_2 && $arg_1 > $arg_3) {
            return $arg_1;
        } else if ($arg_2 > $arg_1 && $arg_2 < $arg_3 || $arg_2 < $arg_1 && $arg_2 > $arg_3) {
            return $arg_2;
        } else if ($arg_3 > $arg_1 && $arg_3 < $arg_2 || $arg_3 < $arg_1 && $arg_3 > $arg_2) {
            return $arg_3;
        } else {
            return "No hay valor del medio";
        }
    }

    $caseUno = findTheMiddleValue(1,5,3);
    $caseDos = findTheMiddleValue(5,1,5);
    $caseTres = findTheMiddleValue(3,5,1);
    $caseCuatro = findTheMiddleValue(3,1,5);
    $caseCinco = findTheMiddleValue(5,3,1);
    $caseSeis = findTheMiddleValue(1,5,1);

    echo "Caso 1: " . $caseUno . "<br>";
    echo "Caso 2: " . $caseDos . "<br>";
    echo "Caso 3: " . $caseTres . "<br>";
    echo "Caso 4: " . $caseCuatro . "<br>";
    echo "Caso 5: " . $caseCinco . "<br>";
    echo "Caso 6: " . $caseSeis . "<br>";
?>
<?php
    /*
    Aplicación No 6 (Carga aleatoria)
    Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
    función rand). Mediante una estructura condicional, determinar si el promedio de los números
    son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
    resultado.
    */

    $numericArray = array();

    for ($i = 0; $i < 5; $i++) {
        $randNum = rand(1,10);
        array_push($numericArray, $randNum);
    }

    $arraySum = array_sum($numericArray);
    $arrayCount = count($numericArray);
    $arrayProm = $arraySum / $arrayCount;

    if ($arrayProm > 6) {
        echo "El promedio es mayor a 6";
    }
    else if ($arrayProm < 6) {
        echo "El promedio es menor a 6";
    }
    else {
        echo "El promedio es 6";
    }

    echo "<br>";

    var_dump($numericArray);
?>
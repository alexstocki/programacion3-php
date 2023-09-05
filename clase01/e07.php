<?php
    /*
    Aplicación No 7 (Mostrar impares)
    Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
    Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
    salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
    utilizando las estructuras while y foreach.
    */

    $arrayImpares = [];

    function fillArray() {
        $newNum = 1;
        $newArray = array();
        
        do {
            if (($newNum % 2) != 0) {
                array_push($newArray, $newNum);
            }

            $newNum += 1;
        } while(count($newArray) <= 10);

        return $newArray;
    }

    $arrayImpares = fillArray($arrayImpares);

    foreach($arrayImpares as $numeroImpar) {
        echo $numeroImpar . "<br>";
    }
?>
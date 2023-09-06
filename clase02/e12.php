<?php

/*
Stocki Alex
Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

function RevertArray($array) {
    $arrayOfChars = str_split($array);
    $revertedArray = array_reverse($arrayOfChars);

    return implode($revertedArray);
}

$palabra = "HOLA"; 

echo $palabra . "<br>";
echo RevertArray($palabra);

<?php

/*
Stocki Alex
Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán: 1 si la palabra
pertenece a algún elemento del listado.
0 en caso contrario.
*/

function ValidarLength($palabra, $max) {
    if ($palabra === "Recuperatorio" 
    || $palabra === "Parcial"
    || $palabra === "Programacion") {
        return 1;
    } else if (strlen($palabra) > $max) {
        return "Palabra excede el maximo determinado";
    } else {
        return 0;
    }
}

echo ValidarLength("Seleccion", 3) . "<br>";
echo ValidarLength("Parcial", 19) . "<br>";
echo ValidarLength("Recuperatorio", 22);
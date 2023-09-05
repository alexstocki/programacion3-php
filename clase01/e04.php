<?php
    /*
    Aplicación No 4 (Calculadora)
    Escribir un programa que use la variable $operador que pueda almacenar los símbolos
    matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
    símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
    resultado por pantalla.
    */

    $operador = array("+", "-", "/", "*");

    function calculadora($operacion, $op1, $op2) {
        switch($operacion) {
            case "+":
                return $op1 + $op2;
                break;
            case "-":
                return $op1 - $op2;
                break;
            case "/":
                return $op1 / $op2;
                break;
            case "*":
                return $op1 * $op2;
                break;
        }
    }

    $casoUno = calculadora($operador[1], 10, 2);
    $casoDos = calculadora($operador[0], 10, 2);
    $casoTres = calculadora($operador[2], 10, 2);
    $casoCuatro = calculadora($operador[3], 10, 2);

    echo "Resta: 10 - 2 -> " . $casoUno . "<br>"; 
    echo "Suma: 10 + 2 -> " . $casoDos . "<br>"; 
    echo "Division: 10 / 2 -> " . $casoTres . "<br>"; 
    echo "Multiplicacion: 10 * 2 -> " . $casoCuatro; 
?>
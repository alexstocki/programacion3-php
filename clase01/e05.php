<?php
    /*
    Aplicación No 5 (Números en letras)
    Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
    por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
    entre el 20 y el 60.
    Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
    */

    function translateFirstHalf($first) {
        switch($first) {
            case 2:
                return "veinti";
                break;
            case 3:
                return "treinta";
                break;
            case 4:
                return "cuarenta";
                break;
            case 5:
                return "cincuenta";
                break;
            case 6:
                return "sesenta";
                break;
        }
    }

    function translateSecondHalf($second) {
        switch($second) {
            case 1:
                return "uno";
                break;
            case 2:
                return "dos";
                break;
            case 3:
                return "tres";
                break;
            case 4:
                return "cuatro";
                break;
            case 5:
                return "cinco";
                break;
            case 6:
                return "seis";
                break;
            case 7:
                return "siete";
                break;
            case 8:
                return "ocho";
                break;
            case 9:
                return "nueve";
                break;
            case 0:
                return "";
                break;
        }
    }

    function translateNumberToWord($num) {
        if ($num >= 20 && $num <= 60) {
            $first = $num[0];
            $second = $num[1];
            
            if ($second == 0) {
                if ($first == 2) {
                    return "veinte";
                } else {
                    return translateFirstHalf($first);
                }
            } 
            else {
                if ($first == 2) {
                    return translateFirstHalf($first) . translateSecondHalf($second);
                } else {
                    return translateFirstHalf($first) . " y " . translateSecondHalf($second);
                }
            }
        } else {
            return "El numero no esta entre 20 y 60";
        }
    }

    echo "43: " . translateNumberToWord("43") . "<br>";
    echo "40: " . translateNumberToWord("40") . "<br>";
    echo "35: " . translateNumberToWord("35") . "<br>";
    echo "20: " . translateNumberToWord("20") . "<br>";
    echo "59: " . translateNumberToWord("59") . "<br>";
    echo "29: " . translateNumberToWord("29") . "<br>";
    echo "60: " . translateNumberToWord("60") . "<br>";
    echo "41: " . translateNumberToWord("41") . "<br>";
    echo "99: " . translateNumberToWord("99") . "<br>";

?>
<?php
    /*
    Aplicación No 2 (Mostrar fecha y estación)
    Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
    distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
    año es. Utilizar una estructura selectiva múltiple.
    */

    $currentDate = date("d-m-Y");
    $currentMonth = date("m");
    $problematicDateFormat = date("m-d-Y");

    echo "El formato perfecto: " . $currentDate . "<br>";
    echo "La abominacion hecha formato de fecha: " . $problematicDateFormat . "<br>";

    switch($currentMonth) {
        case "01":
        case "02":
            echo "Estamos en verano";
            break;
        case "03":
        case "04":
        case "05":
            echo "Estamos en otoño";
            break;
        case "06":
        case "07":
        case "08":
            echo "Estamos en invierno";
            break;
        case "09":
        case "10":
        case "11":
            echo "Estamos en primavera";
            break;
        case "12":
            echo "Estamos en verano";
            break;
    }
?>
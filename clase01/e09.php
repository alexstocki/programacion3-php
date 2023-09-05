<?php
    /*
    Aplicación No 9 (Arrays asociativos)
    Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
    contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
    lapiceras.
    */

    $lapicera = array(
        'color' => 'azul',
        'marca' => 'Bic',
        'trazo' => 'fino',
        'precio' => 50,
    );

    $arrayLapiceras = [];

    for($i = 0; $i < 3; $i++) {
        $lapicera['precio'] += 10;
        array_push($arrayLapiceras, $lapicera);
    }

    foreach($arrayLapiceras as $item) {
        var_dump($item);
        echo "<br>";
    }
?>
<?php
    /*
    Aplicación No 10 (Arrays de Arrays)
    Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
    contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
    Arrays de Arrays.
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

    $arrayAsociativo = array(
        'lapiceras' => $arrayLapiceras,
    );

    $arrayIndexado = array(
        $arrayLapiceras,
    );

    var_dump($arrayAsociativo);
    echo "<br>";
    var_dump($arrayIndexado);
?>
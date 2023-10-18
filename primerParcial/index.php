<?php

    include_once "ManejadorArchivo.php";
    include_once "ClienteAlta.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            if (isset($_POST['nombreApellido']) && isset($_POST['tipoDocumento']) 
                && isset($_POST['numeroDocumento']) && isset($_POST['email']) 
                && isset($_POST['tipoCliente']) && isset($_POST['pais']) 
                && isset($_POST['ciudad']) && isset($_POST['telefono'])) {
                    $cliente = new ClienteAlta($_POST['nombreApellido'], $_POST['tipoDocumento'], $_POST['numeroDocumento'], $_POST['email'], $_POST['tipoCliente'], $_POST['pais'], $_POST['ciudad'], $_POST['telefono']);
                    ClienteAlta::GuardarCliente("hoteles.json", $cliente);
            } 
            else {
                echo "Faltan datos<br>";
            }
            
            break;
        case 'GET':
            echo "No implementado<br>";
            break;
        case 'PUT':
            echo "No implementado<br>";
            break;
        case 'DELETE':
            echo "No implementado<br>";
            break;
    }
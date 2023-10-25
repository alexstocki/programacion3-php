<?php
    include_once "BorrarCliente.php";
    include_once "ConsultarCliente.php";
    include_once "ClienteAlta.php";

    $archivo = "hoteles.json";

    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    
    if ($data && isset($data['numeroDocumento']) && isset($data['tipoCliente']) && isset($data['id'])) {
        $cliente = ConsultarCliente::BuscarClientePorId($archivo, intval($data['id']));
        
        if ($cliente != null) {
            echo "Borrando cliente...<br>";
            if (BorrarCliente::Borrar($archivo, $cliente)) {
                echo "Cliente borrado<br>";
            }
            else {
                echo "Error - No se pudo borrar el cliente<br>";
            }
        }
    }
    else {
        echo "Error - El cliente no encontrado, revisar parametros<br>";
    }
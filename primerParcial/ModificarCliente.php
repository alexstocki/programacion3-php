<?php
    include_once "ConsultarCliente.php";
    include_once "ClienteAlta.php";
    
    $archivo = "hoteles.json";
    
    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    $cliente = new ClienteAlta($data["nombreApellido"], $data["tipoDocumento"], $data["numeroDocumento"], $data["email"], $data["tipoCliente"], $data["pais"], $data["ciudad"], $data["telefono"], $data["id"]);

    if (ConsultarCliente::BuscarCliente($cliente, $archivo) === true) {
        ConsultarCliente::ModificarCliente($archivo, $cliente);
    }
    else {
        echo "Error - El cliente no existe en hoteles.json<br>";
    }
?>

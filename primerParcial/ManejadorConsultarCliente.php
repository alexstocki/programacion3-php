<?php
    include_once "ConsultarCliente.php";
    
    $nombre_archivo = "hoteles.json";

    if (isset($_POST['tipoCliente']) && isset($_POST["numeroCliente"])) {
        $cliente = new ConsultarCliente($_POST['tipoCliente'], $_POST["numeroCliente"]);
        ConsultarCliente::BuscarCliente($cliente, $nombre_archivo);
    } 
    else {
        echo "Faltan datos<br>";
        echo "Verificar: tipoCliente, numeroCliente<br>";
    }
<?php
    include_once "ClienteAlta.php";

    $nombre_archivo = "hoteles.json";
    $carpeta_imagenes = "ImagenesDeClientes/2023/";

    if (isset($_POST['nombreApellido']) && isset($_POST['tipoDocumento']) 
        && isset($_POST['numeroDocumento']) && isset($_POST['email']) 
        && isset($_POST['tipoCliente']) && isset($_POST['pais']) 
        && isset($_POST['ciudad']) && isset($_POST['telefono'])
        && isset($_FILES['imagen'])) {
            $cliente = new ClienteAlta($_POST['nombreApellido'], $_POST['tipoDocumento'], $_POST['numeroDocumento'], $_POST['email'], $_POST['tipoCliente'], $_POST['pais'], $_POST['ciudad'], $_POST['telefono']);
            ClienteAlta::GuardarCliente($nombre_archivo, $cliente, $carpeta_imagenes);
        } 
        else {
            echo "Faltan datos<br>";
            echo "Verificar: nombreApellido, tipoDocumento, numeroDocumento, email, tipoCliente, pais, ciudad, telefono, imagen y 'accion' que sea 'alta'<br>";
    }
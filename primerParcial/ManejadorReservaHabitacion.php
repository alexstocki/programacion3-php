<?php
    include_once "ConsultarCliente.php";
    include_once "ReservaHabitacion.php";

    $nombre_archivo_clientes = "hoteles.json";
    $nombre_archivo_reservas = "reservas.json";
    $carpeta_imagenes = "ImagenesDeReservas2023/";

    if (isset($_POST['tipoCliente']) && isset($_POST['numeroCliente'])
        && isset($_POST['fechaEntrada']) && isset($_POST['fechaSalida'])
        && isset($_POST['tipoHabitacion']) && isset($_POST['importeTotal'])
        && isset($_FILES['imagen'])) {
            $reserva = new ReservaHabitacion($_POST['tipoCliente'], $_POST['numeroCliente'], $_POST['fechaEntrada'], $_POST['fechaSalida'], $_POST['tipoHabitacion'], $_POST['importeTotal']);
            
            ReservaHabitacion::GuardarReserva($nombre_archivo_clientes, $nombre_archivo_reservas, $reserva, $carpeta_imagenes);
        } 
        else {
            echo "Faltan datos<br>";
            echo "Verificar: tipoCliente, numeroCliente, fechaEntrada, fechaSalida, tipoHabitacion, importeTotal<br>";
        }
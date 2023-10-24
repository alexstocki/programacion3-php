<?php
    include_once "CancelarReserva.php";
    include_once "ConsultarCliente.php";

    $archivo_clientes = "hoteles.json";
    $archivo_reservas = "reservas.json";

    if (isset($_POST['tipoCliente']) && isset($_POST['idCliente']) && isset($_POST['idReserva'])) {
        if (CancelarReserva::Cancelar($_POST['tipoCliente'], $_POST['idCliente'], $_POST['idReserva'], $archivo_reservas, $archivo_clientes)) {
            echo "<br>Reserva cancelada.<br>";
        }
        else {
            echo "<br>Error al cancelar la reserva.<br>";
        }
    }
    else {
        echo "Faltan datos<br>";
        echo "Verificar: tipoCliente, numeroCliente, idReserva<br>";
    }

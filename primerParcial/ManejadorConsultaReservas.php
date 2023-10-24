<?php
    include_once "ConsultaReservas.php";

    $archivo_reservas = "reservas.json";

    if (isset($_GET['tipoHabitacion']) && isset($_GET['fechaListar'])) {
        $tipoHabitacion = strtoupper($_GET['tipoHabitacion']);
        $fecha = $_GET['fechaListar'] == "" ? date("d-m-Y", strtotime("-1 days")) : date("d-m-Y", strtotime($_GET['fechaListar']));

        ConsultaReservas::ConsultarReservasTipoHabitacionFecha($archivo_reservas, $tipoHabitacion, $fecha);
    }

    else if (isset($_GET['tipoHabitacion'])) {
        $tipoHabitacion = strtoupper($_GET['tipoHabitacion']);

        ConsultaReservas::ConsultarReservasTipoHabitacion($archivo_reservas, $tipoHabitacion);
    }

    else if (isset($_GET['numeroCliente'])) {
        $idCliente = $_GET['numeroCliente'];

        ConsultaReservas::ConsultarReservasPorIdCliente($archivo_reservas, $idCliente);
    }

    else if (isset($_GET['fechaDesde']) && isset($_GET['fechaHasta'])) {
        $fechaDesde = $_GET['fechaDesde'];
        $fechaHasta = $_GET['fechaHasta'];

        ConsultaReservas::ConsultarReservasEntreDosFechas($archivo_reservas, $fechaDesde, $fechaHasta);
    }
    else {
        echo "Faltan datos<br>";
        echo "Verificar: tipoHabitacion, fecha, idCliente, fechaDesde, fechaHasta<br>";
    }
<?php
    include_once "AjusteReserva.php";

    $archivo_reservas = "reservas.json";
    $archivo_ajustes = "ajustes.json";

    if (isset($_POST['idReserva']) && isset($_POST['motivo']) 
        && $_POST['motivo'] != "" && isset($_POST['importeNuevo'])
        && $_POST['importeNuevo'] != "") {
        if (AjusteReserva::Ajustar($_POST['idReserva'], $_POST['motivo'], $_POST['importeNuevo'], $archivo_reservas, $archivo_ajustes)) {
            echo "<br>Reserva ajustada.<br>";
        }
        else {
            echo "<br>Error al ajustar la reserva - verificar numero de reserva.<br>";
        }
    } 
    else {
        echo "Faltan datos<br>";
        echo "Verificar: idReserva, motivo<br>";
    }
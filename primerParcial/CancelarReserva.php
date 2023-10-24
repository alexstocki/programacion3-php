<?php
    include_once "ReservaHabitacion.php";
    include_once "ConsultarCliente.php";
    include_once "ConsultaReservas.php";

    class CancelarReserva {
        public static function Cancelar($tipoCliente, $numeroCliente, $idReserva, $archivoReservas, $archivoClientes) {
            $tipoCliente = $_POST['tipoCliente'];
            $numeroCliente = $_POST['idCliente'];
            $idReserva = $_POST['idReserva'];

            $cliente = new ConsultarCliente($tipoCliente, $numeroCliente);
            if (ConsultarCliente::BuscarCliente($cliente, $archivoClientes) === true) {
                $reserva = ConsultaReservas::ConsultarReservaId($archivoReservas, $idReserva);
                
                if ($reserva) {
                    return ReservaHabitacion::ModificarReserva($archivoReservas, $reserva, "CANCELADA");
                }
                else {
                    echo "<br>Cliente encontrado - Reserva no encontrada<br>";
                }
            }
            else {
                echo "<br>Cliente no encontrado<br>";
            }
        }
    }
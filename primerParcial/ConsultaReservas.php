<?php
    include_once "ReservaHabitacion.php";

    class ConsultaReservas {
        public static function ConsultarReservasTipoHabitacionFecha($archivo_reservas, $tipoHabitacion, $fecha) {
            $reservas = ReservaHabitacion::LeerReservas($archivo_reservas);
            $total = 0;

            foreach ($reservas as $reserva) {
                if ($reserva->tipoHabitacion == $tipoHabitacion && $reserva->fechaEntrada == $fecha) {
                    $total += intval($reserva->importeTotal);
                }
            }

            echo "Habitación: " . $tipoHabitacion . "<br>" . "Fecha: " . $fecha . "<br>" . "Total: " . $total . "<br>";
        }

        public static function ConsultarReservasTipoHabitacion($archivo_reservas, $tipoHabitacion) {
            $reservas = ReservaHabitacion::LeerReservas($archivo_reservas);
            
            foreach ($reservas as $reserva) {
                if ($reserva->tipoHabitacion == $tipoHabitacion) {
                    echo $reserva->ToJSON() . "<br>";
                }
            }
        }

        public static function ConsultarReservasPorIdCliente($archivo_reservas, $idCliente) {
            $reservas = ReservaHabitacion::LeerReservas($archivo_reservas);
            
            foreach ($reservas as $reserva) {
                if ($reserva->numeroCliente == $idCliente) {
                    echo $reserva->ToJSON() . "<br>";
                }
            }
        }

        public static function ConsultarReservasEntreDosFechas($archivo_reservas, $fechaDesde, $fechaHasta) {
            $reservas = ReservaHabitacion::LeerReservas($archivo_reservas);
            $reservasOrdenadas = [];
            echo "Dentro de consultar<br>";
            echo $reservas;
            foreach ($reservas as $reserva) {
                if ($reserva->fechaDesde >= $fechaDesde && $reserva->fechaHasta <= $fechaHasta) {
                    array_push($reservasOrdenadas, $reserva);
                }
            }

            usort($reservasOrdenadas, function($a, $b) {
                return $a->fechaDesde > $b->fechaDesde;
            });

            foreach ($reservasOrdenadas as $reserva) {
                echo $reserva->ToJSON() . "<br>";
            }
        }

        public static function ConsultarReservaId($archivoReservas, $idReserva) {
            $reservas = ReservaHabitacion::LeerReservas($archivoReservas);
            $reservaEncontrada = null;

            if (count($reservas) > 0) {
                foreach ($reservas as $reserva) {
                    if ($reserva->id == $idReserva) {
                        $reservaEncontrada = $reserva;
                        break;
                    }
                }
            }

            return $reservaEncontrada;
        }
    }
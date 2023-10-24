<?php
    include_once "ManejadorArchivo.php";
    include_once "ConsultarCliente.php";

    class ReservaHabitacion {
        public function __construct($tipoCliente, $numeroCliente, $fechaEntrada, $fechaSalida, $tipoHabitacion, $importeTotal, $id = null, $estado = null) {
            $this->tipoCliente = strtoupper($tipoCliente);
            $this->numeroCliente = $numeroCliente;
            $this->fechaEntrada = date("d-m-Y", strtotime($fechaEntrada));
            $this->fechaSalida = date("d-m-Y", strtotime($fechaSalida));
            $this->tipoHabitacion = strtoupper($tipoHabitacion);
            $this->importeTotal = $importeTotal;
            $this->id = $id == null ? rand(1, 999999) : $id;
            $this->estado = $estado == null ? "PENDIENTE" : $estado;
        }

        public function ToJSON() {
            return json_encode($this);
        }

        public static function GuardarReserva($archivoClientes, $archivoReservas, $reserva, $carpetaImagenes) {
            if (ReservaHabitacion::ValidarCliente($archivoClientes, $reserva) === true) {
                $nombreImagen = $reserva->tipoCliente . $reserva->numeroCliente . $reserva->id;
                $reservas = ManejadorArchivo::Leer($archivoReservas);

                if (count($reservas) > 0) {
                    $reservas = ReservaHabitacion::ParsearReservas($reservas);
                    array_push($reservas, $reserva);
                } else {
                    $reservas = [];
                    array_push($reservas, $reserva);
                }

                ManejadorArchivo::Guardar($archivoReservas, $reservas);
                ManejadorArchivo::GuardarImagen($carpetaImagenes, $nombreImagen);
                echo "Reserva guardada<br>";
            } else {
                echo "Cliente no existe<br>";
            }
        }

        private static function ValidarCliente($archivoClientes, $clienteReserva) {
            $clienteExiste = ConsultarCliente::BuscarCliente($clienteReserva, $archivoClientes);
            
            return $clienteExiste;
        }

        public static function LeerReservas($archivo) {
            $reservas = ManejadorArchivo::Leer($archivo);

            if (count($reservas) > 0) {
                $reservas = ReservaHabitacion::ParsearReservas($reservas);
            }

            return $reservas;
        }

        public static function ParsearReservas($arrayReservas) {
            $reservas = [];

            foreach ($arrayReservas as $reserva) {
                if (is_array($reserva)) {
                    $r = new ReservaHabitacion($reserva['tipoCliente'], $reserva['numeroCliente'], $reserva['fechaEntrada'], $reserva['fechaSalida'], $reserva['tipoHabitacion'], $reserva['importeTotal'], $reserva['id'], $reserva['estado']);
                } else {
                    $r = new ReservaHabitacion($reserva->tipoCliente, $reserva->numeroCliente, $reserva->fechaEntrada, $reserva->fechaSalida, $reserva->tipoHabitacion, $reserva->importeTotal, $reserva->id, $reserva->estado);
                }
                array_push($reservas, $r);
            }

            return $reservas;
        }

        // public static function ModificarReserva($archivoReservas, $reserva, $estado) {
        public static function ModificarReserva($archivoReservas, $reserva, $estado, $importeNuevo = null) {
            $reservas = ReservaHabitacion::LeerReservas($archivoReservas);
            $reservaModificada = false;

            if (count($reservas) > 0) {
                foreach ($reservas as $r) {
                    if ($r->id == $reserva->id) {
                        $r->estado = $estado;
                        if ($importeNuevo != null) {
                            $r->importeTotal = $importeNuevo;
                        }
                        $reservaModificada = true;
                        ManejadorArchivo::Guardar($archivoReservas, $reservas);
                        break;
                    }
                }
            }

            return $reservaModificada;
        }
    }
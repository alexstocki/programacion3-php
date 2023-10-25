<?php
    include_once "ConsultaReservas.php";
    include_once "ManejadorArchivo.php";
    include_once "ReservaHabitacion.php";

    class AjusteReserva {
        public function __construct($idReserva, $motivo, $idAjuste, $importeNuevo) {
            $this->idReserva = $idReserva;
            $this->motivo = $motivo;
            $this->idAjuste = $idAjuste;
            $this->importeNuevo = $importeNuevo;
        }

        public function ToJSON() {
            return json_encode($this);
        }

        public static function Ajustar($idReserva, $motivo, $importeNuevo, $archivoReservas, $archivoAjustes) {
            $reserva = ConsultaReservas::ConsultarReservaId($archivoReservas, $idReserva);

            if ($reserva) {
                if (ReservaHabitacion::ModificarReserva($archivoReservas, $reserva, "AJUSTADA", $importeNuevo)) {
                    $ajustes = AjusteReserva::LeerAjustes($archivoAjustes);

                    $idAjuste = count($ajustes) > 0 ? count($ajustes) + 1 : 1;
                    
                    $ajuste = new AjusteReserva($idReserva, $motivo, $idAjuste, $importeNuevo);
                    
                    array_push($ajustes, $ajuste);

                    ManejadorArchivo::Guardar($archivoAjustes, $ajustes);

                    return true;
                }
            }
            else {
                echo "<br>Reserva no encontrada<br>";
            }

            return false;
        }

        public static function LeerAjustes($archivoAjustes) {
            $ajustes = ManejadorArchivo::Leer($archivoAjustes);
            
            if (count($ajustes) > 0) {
                $ajustes = AjusteReserva::ParsearAjustes($ajustes);
            }

            return $ajustes;
        }

        public static function ParsearAjustes($arrayAjustes) {
            $ajustes = [];

            foreach ($arrayAjustes as $ajuste) {
                if (is_array($ajuste)) {
                    $a = new AjusteReserva($ajuste['idReserva'], $ajuste['motivo'], $ajuste['idAjuste'], $ajuste['importeNuevo']);
                } else {
                    $a = new AjusteReserva($ajuste->idReserva, $ajuste->motivo, $ajuste->idAjuste, $ajuste->importeNuevo);
                }
                array_push($ajustes, $a);
            }

            return $ajustes;
        }
    }
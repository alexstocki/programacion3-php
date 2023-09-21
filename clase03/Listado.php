<?php

    include_once "Usuario.php";

    class Listado {

        public function __construct() {

        }

        public static function Listado($entidad) {
            $archivo = fopen($entidad . ".csv", "r");
            $listadoEntidad = [];

            if ($archivo != false) {
                while (!feof($archivo)) {
                    $linea = fgets($archivo);
                    $datos = explode(",", $linea);

                    if (count($datos) > 2) {
                        $entidad = new Usuario($datos[0], $datos[1], $datos[2]);
                        array_push($listadoEntidad, $entidad);
                    }
                }
            } else {
                return false;
            }

            fclose($archivo);

            return $listadoEntidad;
        }

        public static function ListadoHTML($entidad) {
            $listado = Listado::Listado($entidad);
            $html = "<ul>";

            if (count($listado) > 0) {
                foreach ($listado as $entidad) {
                    foreach ($entidad as $atributo) {
                        $html .= "<li>" . $atributo . "</li>";
                    }
                    $html .= "<br/>"; 
                }
            } else {
                $html .= "<li>No hay " . $entidad . " cargados</li>";
            }
            
            
            $html .= "</ul>";

            return $html;
        }
    }
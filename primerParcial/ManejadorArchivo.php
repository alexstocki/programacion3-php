<?php

    class ManejadorArchivo {
        public static function Guardar($archivo, $objetos) {
            $archivo = fopen($archivo, "w");
            foreach ($objetos as $objeto) {
                fwrite($archivo, $objeto->ToJSON() . "\n");
            }
            fclose($archivo);
        }

        public static function Leer($archivo) {
            $objetos = array();

            $archivo = fopen($archivo, "a+");
            rewind($archivo);
            while (!feof($archivo)) {
                $linea = fgets($archivo);
                if ($linea !== false) {
                    $objeto = json_decode($linea, true);
                    array_push($objetos, $objeto);
                }
            }
            fclose($archivo);

            return $objetos;
        }
    }
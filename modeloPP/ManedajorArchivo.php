<?php

    public class ManejadorArchivo {
       
        public static LeerArchivo($archivo) {
            $array = array();
            $archivo = fopen($archivo, "r");

            while(!feof($archivo)) {
                $linea = (fgets($archivo));

                if($linea != "") {
                    $objeto = json_decode($linea);
                    array_push($array, $objeto);
                }
            }
            
            fclose($archivo);
            return $array;
        }

        public static GuardarArchivo($archivo, $objeto) {
            $archivo = fopen($archivo, "a");
            $retorno = false;

            if (fwrite($archivo, json_encode($objeto)."\n")) {
                $retorno = true;
            }

            fclose($archivo);
            return $retorno;
        }
    }
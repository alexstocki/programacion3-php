<?php
    class ManejadorArchivo {
        public static function Guardar($archivo, $objetos) {
            $archivo = fopen($archivo, "w");
            
            if (is_array($objetos)) {
                foreach ($objetos as $objeto) {
                    fwrite($archivo, $objeto->ToJSON() . "\n");
                }
            } else {
                fwrite($archivo, $objetos->ToJSON() . "\n");
            }

            fclose($archivo);
        }

        public static function Leer($nombreArchivo) {
            $objetos = [];
        
            $archivo = fopen($nombreArchivo, "r+");
            if ($archivo === false) {
                return $objetos;
            }
        
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

        public static function GuardarImagen($carpeta, $nombreImagen) {
            $nombre_archivo = $_FILES['imagen']['name'];
            $ruta_destino = $carpeta . $nombreImagen . ".jpg";

            if (move_uploaded_file($_FILES['imagen']["tmp_name"], $ruta_destino)) {
                echo "Imagen guardada con exito<br>";
            } else {
                echo "Error al guardar imagen<br>";
            }
        }
    }
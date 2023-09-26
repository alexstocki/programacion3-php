<?php

    class Usuario {
        public $nombre;
        public $clave;
        public $mail;
        public $id;
        public $fechaRegistro;

        public function __construct($nombre, $clave, $mail) {
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->mail = $mail;
            $this->id = rand(1, 10000);
            $this->fechaRegistro = date('d-m-Y');
            echo "Inside Usuario class construct<br>";
        }

        public static function GuardarEnArchivo($usuario) {
            $archivo = fopen("usuarios.json", 'a');

            if ($archivo !== false) {
                // formateo de $usuario a JSON
                $usuarioJSON = json_encode($usuario);

                // agrego un salto de linea
                $usuarioJSON .= "\n";

                // escribo en el archivo
                fwrite($archivo, $usuarioJSON);

                // cierro el archivo
                fclose($archivo);

                return true;
            }

            return false;
        }
    }
<?php

    class Usuario {
        public $nombre;
        public $clave;
        public $mail;
        public $id;
        public $fechaRegistro;

        public function __construct($nombre, $clave, $mail, $id = null, $fechaRegistro = null) {
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->mail = $mail;
            $this->id = $id ?? rand(1, 10000);
            $this->fechaRegistro = $fechaRegistro ?? date('Y-m-d'); 
        }

        public static function GuardarEnArchivo($usuario) {
            $archivo = fopen("usuarios.json", 'a');

            if ($archivo !== false) {
                $usuarioJSON = json_encode($usuario);

                $usuarioJSON .= "\n";

                fwrite($archivo, $usuarioJSON);

                fclose($archivo);

                return true;
            }

            return false;
        }

        public static function CargarUsuarios() {
            $archivo = fopen("usuarios.json", 'r');
            $listaUsuarios = [];

            if ($archivo !== false) {
                while(!feof($archivo)) {
                    $usuarioJSON = json_decode(fgets($archivo), true);

                    if ($usuarioJSON === null) {
                        break;
                    }

                    $usuario = new Usuario($usuarioJSON['nombre'], $usuarioJSON['clave'], $usuarioJSON['mail'], $usuarioJSON['id'], $usuarioJSON['fechaRegistro']);
                    array_push($listaUsuarios, $usuario);
                }

                fclose($archivo);
            }

            return $listaUsuarios;
        }

        public static function BuscarPorId($listaUsuarios, $id) {
            $listaUsuarios = Usuario::CargarUsuarios();

            foreach($listaUsuarios as $usuario) {
                if ($usuario->id == $id) {
                    return $usuario;
                }
            }

            return null;
        }

        public function MostrarUsuario() {
            echo "Clave: " . $this->clave . "<br>" . "Nombre: " . $this->nombre . "<br>" . "Mail: " . $this->mail . "<br>" . "Fecha de registro: " . $this->fechaRegistro . "<br>"; 
        }
    }
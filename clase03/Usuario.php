<?php

    class Usuario {
        public $nombre;
        public $clave;
        public $mail;

        public function __construct($nombre, $clave, $mail){
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->mail = $mail;
        }

        public function __toString(){
            return $this->nombre . " - " . $this->clave . " - " . $this->mail;
        }

        public static function guardarUsuario($usuario){
            $archivo = fopen("usuarios.csv", "a");
            $usuarios = Usuario::leerUsuarios();
            
            if($archivo != false){
                if(count($usuarios) > 0) {
                    foreach($usuarios as $user){
                        if(Usuario::equals($usuario, $user)){
                            return false;
                        }
                    }
                    $escritura = fwrite($archivo, $usuario->nombre . "," . $usuario->clave . "," . $usuario->mail . "\n");
                } else {
                    $escritura = fwrite($archivo, $usuario->nombre . "," . $usuario->clave . "," . $usuario->mail . "\n");
                }
            } else {
                echo "No se pudo abrir el archivo";
                return false;
            }

            fclose($archivo);
            return true;
        }

        public static function leerUsuarios(){
            $archivo = fopen("usuarios.csv", "r");
            $usuarios = [];

            if($archivo != false){
                while(!feof($archivo)){
                    $linea = fgets($archivo);
                    $datos = explode(",", $linea);

                    if(count($datos) > 2){
                        $usuario = new Usuario($datos[0], $datos[1], $datos[2]);
                        array_push($usuarios, $usuario);
                    }
                }
            } else {
                return false;
            }

            fclose($archivo);

            return $usuarios;
        }


        public static function equals($usuario1, $usuario2) {
            return trim($usuario1->mail) == trim($usuario2->mail);
        }
    }
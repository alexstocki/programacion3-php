<?php
    include_once "ManejadorArchivo.php";
    include_once "ClienteAlta.php";

    class ConsultarCliente {
        public function __construct($tipoCliente, $numeroCliente) {
            $this->tipoCliente = strtoupper($tipoCliente);
            $this->numeroCliente = $numeroCliente;
        }

        public static function BuscarCliente($cliente, $nombreArchivo) {
            $clientes = ConsultarCliente::LeerClientes($nombreArchivo);

            if (count($clientes) > 0) {
                $flag = false;
                foreach ($clientes as $c) {
                    $resultadoBusqueda = ConsultarCliente::CompararClientes($c, $cliente);
                    if ($resultadoBusqueda === true) {
                        echo "<br>Cliente encontrado.<br>";
                        echo "Pais: " . $c->pais . "\t" . "Ciudad: " . $c->ciudad . "\t" . "Telefono: " . $c->telefono . "<br>";
                        $flag = true;
                        break;
                    } else if ($resultadoBusqueda === false) {
                        echo "Tipo de documento incorrecto.<br>";
                        $flag = 'Error';
                        break;
                    }
                }
                if (!$flag) {
                    echo "No existe la combinacion Numero y Tipo de documento.<br>";
                }
            }

            return $flag;
        }

        public static function LeerClientes($nombreArchivo) {
            $clientes = ConsultarCliente::ParsearClientes($nombreArchivo);

            return $clientes;
        }

        private static function ParsearClientes($nombreArchivo) {
            $arrayClientes = ManejadorArchivo::Leer($nombreArchivo);
            $clientes = [];

            foreach ($arrayClientes as $cliente) {
                if (is_array($cliente)) {
                    $c = new ClienteAlta($cliente["nombreApellido"], $cliente["tipoDocumento"], $cliente["numeroDocumento"], $cliente["email"], $cliente["tipoCliente"], $cliente["pais"], $cliente["ciudad"], $cliente["telefono"], $cliente["id"]);
                } else {
                    $c = new ClienteAlta($cliente->nombreApellido, $cliente->tipoDocumento, $cliente->numeroDocumento, $cliente->email, $cliente->tipoCliente, $cliente->pais, $cliente->ciudad, $cliente->telefono, $cliente->id);
                }
                array_push($clientes, $c);
            }

            return $clientes;
        }

        public static function CompararClientes($clienteBaseDatos, $clienteIncoming) {
            if ($clienteBaseDatos->id == intval($clienteIncoming->numeroCliente) ||
                $clienteBaseDatos->id == $clienteIncoming->id) {
                if ($clienteBaseDatos->tipoCliente == $clienteIncoming->tipoCliente) {
                    return true;
                }
                else {
                    return false;
                }
            }
            
            return null;
        }

        public static function ModificarCliente($archivo, $cliente) {
            $clientes = ConsultarCliente::LeerClientes($archivo);
            
            foreach ($clientes as $c) {
                if (ConsultarCliente::CompararClientes($c, $cliente) === true) {
                    $c->nombreApellido = $cliente->nombreApellido;
                    $c->tipoDocumento = $cliente->tipoDocumento;
                    $c->numeroDocumento = $cliente->numeroDocumento;
                    $c->email = $cliente->email;
                    $c->tipoCliente = $cliente->tipoCliente;
                    $c->pais = $cliente->pais;
                    $c->ciudad = $cliente->ciudad;
                    $c->telefono = $cliente->telefono;
                    $c->id = $cliente->id;
                }
            }

            ManejadorArchivo::Guardar($archivo, $clientes);
            echo "<br>Cliente modificado.<br>";
        }


    }
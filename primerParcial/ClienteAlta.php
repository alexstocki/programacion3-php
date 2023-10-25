<?php
    include_once "ManejadorArchivo.php";

    class ClienteAlta {
        public function __construct($nombreApellido, $tipoDocumento, $numeroDocumento, $email, $tipoCliente, $pais, $ciudad, $telefono, $id, $modalidadPago = null) {
            $this->nombreApellido = $nombreApellido;
            $this->tipoDocumento = strtoupper($tipoDocumento);
            $this->numeroDocumento = $numeroDocumento;
            $this->email = $email;
            // $this->tipoCliente = strtoupper($tipoCliente);
            $this->tipoCliente = ClienteAlta::GenerarTipoCliente($tipoCliente, $tipoDocumento);
            $this->pais = $pais;
            $this->ciudad = $ciudad;
            $this->telefono = $telefono;
            $this->id = $id == null ? rand(1, 999999) : $id;
            $this->modalidadPago = $modalidadPago == null ? 'Efectivo' : $modalidadPago;
        }

        // retorna un objeto JSON 
        public function ToJSON() {
            return json_encode($this);
        }

        // guardar cliente en archivo
        public static function GuardarCliente($archivo, $cliente, $carpeta_imagenes) {
            // leer archivo
            $clientes = ClienteAlta::LeerClientes($archivo);

            // si el archivo no esta vacio
            if ($clientes != null) {
                // parsear array a objetos ClienteAlta
                $clientes = ClienteAlta::ParsearClientes($clientes);
                $flag = false;

                // loopeo el array de clientes parseados
                foreach ($clientes as $c) {
                    // si el cliente existe
                    if (ClienteAlta::CompararClientes($c, $cliente)) {
                        echo "Error - El cliente ya existe<br>";
                        $flag = true;
                    }
                }
                // si el cliente no existe, lo agrego
                $flag == false ? array_push($clientes, $cliente) : null;
            } else {
                // si el archivo esta vacio
                $clientes = array();
                // agregar cliente
                array_push($clientes, $cliente);
            }
            // guardar cliente y foto
            if (!$flag) {
                $nombreImagen = $cliente->id . strtoupper(substr($cliente->tipoCliente, 0, 2));
                ManejadorArchivo::Guardar($archivo, $clientes);
                ManejadorArchivo::GuardarImagen($carpeta_imagenes, $nombreImagen);
            }
            else {
                echo "No se guardo el cliente<br>";
            }
        }

        // leer clientes de archivo
        private static function LeerClientes($archivo) {
            $clientes = array();

            // leer archivo
            $clientes = ManejadorArchivo::Leer($archivo);

            // si el archivo no esta vacio
            if ($clientes != null) {
                // parsear array a cliente
                $clientesParseados = ClienteAlta::ParsearClientes($clientes);
                return $clientesParseados;
            }

            return null;
        }

        private static function ParsearClientes($arrayClientes) {
            $clientes = []; 

            foreach ($arrayClientes as $cliente) {
                if (is_array($cliente)) {
                    $c = new ClienteAlta($cliente["nombreApellido"], $cliente["tipoDocumento"], $cliente["numeroDocumento"], $cliente["email"], $cliente["tipoCliente"], $cliente["pais"], $cliente["ciudad"], $cliente["telefono"], $cliente["id"], $cliente["modalidadPago"]);
                } else {
                    $c = new ClienteAlta($cliente->nombreApellido, $cliente->tipoDocumento, $cliente->numeroDocumento, $cliente->email, $cliente->tipoCliente, $cliente->pais, $cliente->ciudad, $cliente->telefono, $cliente->id, $cliente->modalidadPago);
                }
                array_push($clientes, $c);
            }

            return $clientes;
        }  

        // compara dos clientes, tomando como referencia: nombre y apellido y tipo de cliente
        // private static function CompararClientes($clienteBase, $clienteIncoming) {
        //     if ($clienteBase->nombreApellido == $clienteIncoming->nombreApellido &&
        //         $clienteBase->tipoCliente == $clienteIncoming->tipoCliente) {
        //         return true;
        //     }
            
        //     return false;
        // }
        private static function CompararClientes($clienteBase, $clienteIncoming) {
            if ($clienteBase->id == $clienteIncoming->id &&
                $clienteBase->numeroDocumento == $clienteIncoming->numeroDocumento) {
                return true;
            }
            
            return false;
        }

        private static function GenerarTipoCliente($tipoCliente, $tipoDocumento) {
            
            $tipoClienteShort = strtoupper($tipoCliente);

            if ($tipoClienteShort == 'INDIVIDUAL') {
                $tipoClienteFinal = substr($tipoClienteShort, 0, 4) . strtoupper($tipoDocumento);
            }
            else {
                $tipoClienteFinal = substr($tipoClienteShort, 0, 5) . strtoupper($tipoDocumento);
            }
            
            return $tipoClienteFinal;
        }
    }
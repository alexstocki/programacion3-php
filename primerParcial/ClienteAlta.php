<?php

    include_once "ManejadorArchivo.php";

    class ClienteAlta {
        public function __construct($nombreApellido, $tipoDocumento, $numeroDocumento, $email, $tipoCliente, $pais, $ciudad, $telefono) {
            $this->nombreApellido = $nombreApellido;
            $this->tipoDocumento = $tipoDocumento;
            $this->numeroDocumento = $numeroDocumento;
            $this->email = $email;
            $this->tipoCliente = $tipoCliente;
            $this->pais = $pais;
            $this->ciudad = $ciudad;
            $this->telefono = $telefono;
            $this->id = rand(1, 999999);
        }

        // retorna un objeto JSON 
        public function ToJSON() {
            return json_encode($this);
        }

        // guardar cliente en archivo
        public static function GuardarCliente($archivo, $cliente) {
            // $clientes = array();

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
                        // sobreescribo los datos del cliente existente con los datos que recibo
                        $c = ClienteAlta::ModificarDatosCliente($c, $cliente);
                        $flag = true;
                        echo "Cliente modificado con exito<br>";
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
            // guardar archivo
            ManejadorArchivo::Guardar($archivo, $clientes);
            echo "Cliente guardado con exito<br>";
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

        // parsear array a cliente
        // private static function ParsearClientes($arrayClientes) {
        //     $clientes = []; 
        //     foreach ($arrayClientes as $cliente) {
        //         $c = new ClienteAlta($cliente["nombreApellido"], $cliente["tipoDocumento"], $cliente["numeroDocumento"], $cliente["email"], $cliente["tipoCliente"], $cliente["pais"], $cliente["ciudad"], $cliente["telefono"]);
        //         // $c = new ClienteAlta($cliente->nombreApellido, $cliente->tipoDocumento, $cliente->numeroDocumento, $cliente->email, $cliente->tipoCliente, $cliente->pais, $cliente->ciudad, $cliente->telefono);
        //         array_push($clientes, $c);
        //     }
        //     return $clientes;
        // }
        private static function ParsearClientes($arrayClientes) {
            $clientes = []; 
            foreach ($arrayClientes as $cliente) {
                if (is_array($cliente)) {
                    $c = new ClienteAlta($cliente["nombreApellido"], $cliente["tipoDocumento"], $cliente["numeroDocumento"], $cliente["email"], $cliente["tipoCliente"], $cliente["pais"], $cliente["ciudad"], $cliente["telefono"]);
                } else {
                    $c = new ClienteAlta($cliente->nombreApellido, $cliente->tipoDocumento, $cliente->numeroDocumento, $cliente->email, $cliente->tipoCliente, $cliente->pais, $cliente->ciudad, $cliente->telefono);
                }
                array_push($clientes, $c);
            }
            return $clientes;
        }
           

        // compara dos clientes, tomando como referencia: nombre y apellido y tipo de cliente
        private static function CompararClientes($clienteBase, $clienteIncoming) {
            if ($clienteBase->nombreApellido == $clienteIncoming->nombreApellido &&
                $clienteBase->tipoCliente == $clienteIncoming->tipoCliente) {
                return true;
            }
            return false;
        }

        // modificar cliente
        private static function ModificarDatosCliente($clienteBaseDatos, $clienteIncoming) {
            $clienteBaseDatos->nombreApellido = $clienteIncoming->nombreApellido;
            $clienteBaseDatos->tipoDocumento = $clienteIncoming->tipoDocumento;
            $clienteBaseDatos->numeroDocumento = $clienteIncoming->numeroDocumento;
            $clienteBaseDatos->email = $clienteIncoming->email;
            $clienteBaseDatos->tipoCliente = $clienteIncoming->tipoCliente;
            $clienteBaseDatos->pais = $clienteIncoming->pais;
            $clienteBaseDatos->ciudad = $clienteIncoming->ciudad;
            $clienteBaseDatos->telefono = $clienteIncoming->telefono;
            return $clienteBaseDatos;
        }
    }
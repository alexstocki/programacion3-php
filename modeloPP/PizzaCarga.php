<?php

    // PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). 
    // Se guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
    // identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.

    public class PizzaCarga {
        public $id;
        public $sabor;
        public $precio;
        public $tipo;
        public $cantidad;

        public function __contruct($sabor, $precio, $tipo, $cantidad) {
            $this->id = rand(1, 10000);
            $this->sabor = $sabor;
            $this->precio = $precio;
            $this->tipo = $tipo;
            $this->cantidad = $cantidad;
        }

        public static function Equals($pizzaDataBase, $pizzaIncoming) {
            $retorno = false;
            if($pizzaDataBase->sabor == $pizzaIncoming->sabor && $pizzaDataBase->tipo == $pizzaIncoming->tipo) {
                $retorno = true;
            }

            return $retorno;
        }

        public static function Exists($)

        public static function LeerJson($archivo) {
            $pizzas = ManejadorArchivo::LeerArchivo($archivo);
            $objetosPizza = [];

            if (count($pizzas) > 0) {
                foreach ($pizzas as $pizza) {
                    $objetoPizza = new PizzaCarga($pizza->sabor, $pizza->precio, $pizza->tipo, $pizza->cantidad);
                    array_push($objetosPizza, $objetoPizza);
                }
            }

            return $objetosPizza;
        }

        public static function CargarPizza($archivo, $pizzaIncoming) {
            $pizzas = PizzaCarga::LeerJson($archivo);
            $retorno = false;

            if (count($pizzas) > 0) {
                foreach ($pizzas as $pizzaDataBase) {
                    if (PizzaCarga::Equals($pizzaDataBase, $pizza)) {
                        $pizzaDataBase->precio = $pizzaIncoming->precio;
                        $pizzaDataBase->cantidad += $pizzaIncoming->cantidad;
                        $retorno = true;
                        break;
                    }
                }
            }

            if (!$retorno) {
                $pizza->id = count($pizzas) + 1;
                array_push($pizzas, $pizzaIncoming);
                $retorno = true;
            }

            ManejadorArchivo::GuardarArchivo($archivo, $pizzas);
            return $retorno;
        }

    }
<?php

    // PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo Pizza.json,
    // retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.
    
    public class PizzaConsultar {
        public $sabor;
        public $tipo;

        public function __contruct($sabor, $tipo) {
            $this->sabor = $sabor;
            $this->tipo = $tipo;
        }

        public static function ConsultarPizza($sabor, $tipo) {
            $retorno = "No hay";
            $pizzas = PizzaCarga::LeerJson("Pizza.json");

            if (count($pizzas) > 0) {
                foreach ($pizzas as $pizza) {
                    if ($pizza->sabor == $sabor && $pizza->tipo == $tipo) {
                        $retorno = "Si hay";
                        break;
                    } else if ($pizza->sabor == $sabor && $pizza->tipo != $tipo) {
                        $retorno = "No hay tipo";
                        break;
                    } else if ($pizza->sabor != $sabor && $pizza->tipo == $tipo) {
                        $retorno = "No hay sabor";
                        break;
                    }
                }
            }

            return $retorno;
        }
    }
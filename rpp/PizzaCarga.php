<?php

include_once "ManejadorArchivos.php";

class PizzaCarga {
    public $id;
    public $sabor;
    public $precio;
    public $tipo;
    public $cantidad;

    public function __construct($sabor, $precio, $tipo, $cantidad) {
        $this->id = rand(1, 10000);
        $this->sabor = $sabor;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
    }

    public function ToJSON() {
        return json_encode($this);
    }

    public static function Equals($pizzaDataBase, $pizzaIncoming, $sabor = null, $tipo = null) {
        $retorno = false;

        if ($pizzaIncoming !== null) {
            if ($pizzaDataBase->sabor == $pizzaIncoming->sabor && $pizzaDataBase->tipo == $pizzaIncoming->tipo) {
                $retorno = true;
            }
        } else {
            if ($pizzaDataBase->sabor == $sabor && $pizzaDataBase->tipo == $tipo) {
                $retorno = true;
            }
        }

        return $retorno;
    }

    public static function Guardar($archivo, $incomingPizza) {
        $pizzas = PizzaCarga::Leer();
        $match = false;

        if (count($pizzas) > 0) {
            foreach ($pizzas as $p) {
                if (PizzaCarga::Equals($p, $incomingPizza)) {
                    $p->precio = $incomingPizza->precio;
                    $p->cantidad += $incomingPizza->cantidad;
                    echo "Actualizando pizza...<br>";
                    $match = true;
                    break;
                }
            }
            if (!$match) {
                echo "Agregando pizza...<br>";
                array_push($pizzas, $incomingPizza);
            }
        } else {
            array_push($pizzas, $incomingPizza);
        }

        echo "Pizza guardada...<br>";

        ManejadorArchivos::Guardar("Pizza.json", $pizzas);
    }

    public static function Leer($archivo) {
        $pizzas = ManejadorArchivos::Leer($archivo);
        $pizzasObj = [];

        if (count($pizzas) > 0) {
            foreach ($pizzas as $pizza) {
                $p = new PizzaCarga($pizza["sabor"], $pizza["precio"], $pizza["tipo"], $pizza["cantidad"]);
                array_push($pizzasObj, $p);
            }
        }

        return $pizzasObj;
    }
}
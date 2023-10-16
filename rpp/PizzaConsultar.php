<?php

include_once "PizzaCarga.php";

class PizzaConsultar {
    public static function ConsultarPizza($sabor, $tipo) {
        if (isset($_POST["sabor"]) && isset($_POST["tipo"])) {
            $pizzas = PizzaCarga::Leer();
            $retorno = false;

            if (count($pizzas) > 0) {
                foreach ($pizzas as $p) {
                    if (PizzaCarga::Equals($p, null, $sabor, $tipo)) {
                        $retorno = true;
                        break;
                    }
                }
            }

            if ($retorno) {
                echo "Si Hay";
            } else {
                if ($retorno == false && $sabor == "" && $tipo == "") {
                    echo "No se ingreso ni sabor ni tipo";
                } else if ($retorno == false && $sabor == "") {
                    echo "No se ingreso sabor";
                } else if ($retorno == false && $tipo == "") {
                    echo "No se ingreso tipo";
                } else {
                    echo "No Hay";
                }
            }
        } else {
            echo "Faltan datos";
        }
    }
}
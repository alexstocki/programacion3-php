<?php

    class AltaVenta {
        public static CargaVenta($archivo, $mail, $sabor, $cantidad) {
            $inventarioPizzas = ManejadorArchivos::Leer($archivo);

            // verificar si hay una pizza con ese sabor y si hay suficiente cantidad
            $pizza = null;
            if (count($inventarioPizzas) > 0) {
                if (AltaVenta::ValidarSabor($inventarioPizzas, $sabor)) {

                } 
                foreach ($inventarioPizzas as $p) {
                    if ($p->sabor == $sabor && $p->cantidad >= $cantidad) {
                        $pizza = $p;
                        break;
                    }
                }
            } else {
                echo "No hay pizzas en el inventario";
            }

            if ($pizza !== null) {
                // si hay una pizza con ese sabor y hay suficiente cantidad, restar la cantidad vendida
                $pizza->cantidad -= $cantidad;
                ManejadorArchivos::Guardar($archivo, $inventarioPizzas);

                // guardar la venta en el archivo de ventas
                $ventas = ManejadorArchivos::Leer("Venta.json");
                $venta = new Venta($mail, $sabor, $cantidad);
                array_push($ventas, $venta);
                ManejadorArchivos::Guardar("Venta.json", $ventas);

                echo "Venta realizada";
            } else {
                echo "No hay suficiente cantidad de pizzas con ese sabor";
            }
        }

        private static ValidarSabor($pizzas, $sabor) {
            foreach ($pizzas as $p) {
                if ($p->sabor == $sabor) {
                    return $p;
                }
            }
            
            return null;
        }

        private static ValidarStock($pizza, $sabor)
    }
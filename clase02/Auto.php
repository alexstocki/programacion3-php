<?php

    /*
    Stocki Alex
    Realizar una clase llamada “Auto” 
    que posea los siguientes atributos privados: 
    _color (String)
    _precio (Double)
    _marca (String).
    _fecha (DateTime)

    Realizar un constructor capaz de poder instanciar objetos pasándole como

    parámetros: 
    i. La marca y el color.
    ii. La marca, color y el precio.
    iii. La marca, color, precio y fecha.

    Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
    por parámetro y que se sumará al precio del objeto.

    Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
    por parámetro y que mostrará todos los atributos de dicho objeto.

    Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
    devolverá TRUE si ambos “Autos” son de la misma marca.

    Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
    de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
    la suma de los precios o cero si no se pudo realizar la operación.
    */

    class Auto {
        private $_marca;
        private $_color;
        private $_precio;
        private $_fecha;
    
        public function __construct($marca, $color, $precio = 10500.90) {
            $this->_marca = $marca;
            $this->_color = $color;
            $this->_precio = $precio;
            $this->_fecha = new DateTime();
        }
    
        public function AgregarImpuestos($importe) {
            return $this->_precio + $importe;
        }
    
        public static function MostrarAuto($auto) {
            return "Marca: " . $auto->_marca . "<br>" . "Color: " . $auto->_color . "<br>" . "Precio: " . $auto->_precio . "<br>" . "Comprado: " . $auto->_fecha->format('d-m-Y') . "<br>";
        }
    
        public function Equals($auto2) {
            if ($this->_marca === $auto2->_marca) {
                return true;
            } else {
                return false;
            }
        }
    
        public static function Add($auto1, $auto2) {
            if ($auto1->_marca === $auto2->_marca
                && $auto1->_color === $auto2->_color) {
                return $auto1->_precio + $auto2->_precio;
            } else {
                return 0;
            }
        }

        public static function Save($auto) {
            $archivo = fopen("auto.csv", "a");

            if ($archivo !== false) {
                echo "<br>Se abrio/creo el archivo<br>";
                fwrite($archivo, $auto->_marca . ";" . $auto->_color . ";" . $auto->_precio . ";" . $auto->_fecha->format('d-m-Y') . "\n");
                fclose($archivo);
            }
            else {
                echo "No se pudo abrir el archivo<br>";
                return false;
            }
            
            return true;
        }

        public static function Read() {
            $archivo = fopen("auto.csv", "r");
            $arrayAutos = [];

            if ($archivo != false) {
                while (!feof($archivo)) {
                    $linea = fgets($archivo);
                    $auto = explode(";", $linea);

                    if ($auto[0] !== "") {
                        array_push($arrayAutos, new Auto($auto[0], $auto[1], $auto[2]));
                    }
                }
                
                fclose($archivo);

                return $arrayAutos;
            }

            return false;
        }
    }

    ?>    
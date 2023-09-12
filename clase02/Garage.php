<?php
/*
    Crear la clase Garage que posea como atributos privados:

    _razonSocial (String)
    _precioPorHora (Double)
    _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
    
    Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros: 
    i. La razón social.
    ii. La razón social, y el precio por hora.

    Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
    que mostrará todos los atributos del objeto.

    Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
    objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.

    Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    (sólo si el auto no está en el garaje, de lo contrario informarlo).

    Ejemplo: $miGarage->Add($autoUno);

    Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
    “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). 
    
    Ejemplo:
    $miGarage->Remove($autoUno);
*/

class Garage {
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = 0) {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }

    public function MostrarGarage() {
        return "Nombre garage: " . $this->_razonSocial . "<br>" . "Precio por hora: " . $this->_precioPorHora . "<br>" . "Autos: " . "<br>";
    }

    public function Equals($auto) {
        foreach ($this->_autos as $autoGarage) {
            if ($autoGarage->Equals($auto)) {
                return true;
            }
        }
        return false;
    }

    public function Add($auto) {
        if (!$this->Equals($auto)) {
            array_push($this->_autos, $auto);
            return true;
        } else {
            return false;
        }
    }

    public function Remove($auto) {
        if ($this->Equals($auto)) {
            $index = array_search($auto, $this->_autos);
            unset($this->_autos[$index]);
            $this->_autos = array_values($this->_autos);
            return true;
        } else {
            return false;
        }
    }
}

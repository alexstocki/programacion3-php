<?php
/*
    Stocki Alex
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
        $arrayAutos = "";

        foreach($this->_autos as $auto) {
            $arrayAutos .= Auto::MostrarAuto($auto);
        }

        return "Nombre garage: " . $this->_razonSocial . "<br>" . "Precio por hora: " . $this->_precioPorHora . "<br>" . "Autos: " . $arrayAutos . "<br>";
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

    public static function Save($garage) {
        $fileName = Garage::GetGarageNameForFile($garage, true) . ".csv";
        $archivo = fopen($fileName, "a");
        

        if ($archivo !== false) {
            fwrite($archivo, $garage->_razonSocial . ";" . $garage->_precioPorHora);
            fclose($archivo);
        }
        else {
            return false;
        }

        return true;
    }

    public static function Read() {
        $fileName = Garage::GetGarageNameForFile('Garage 1', false) . ".csv";
        $archivo = fopen($fileName, "r");
        $garageFromFile;

        if ($archivo !== false) {
            while (!feof($archivo)) {
                $linea = fgets($archivo);
                $garage = explode(";", $linea);

                if ($garage[0] !== "") {
                    $garageFromFile = new Garage($garage[0], $garage[1]);
                }
            }
            
            fclose($archivo);

            return $garageFromFile;
        }

        return false;
    }

    public static function GetGarageNameForFile($garage, $isObject) {
        if ($isObject) {
            return str_replace(" ", "-", $garage->_razonSocial);
        }

        return str_replace(" ", "-", $garage);
    }

    public function LoadCarsFromFile($arrayAutos) {        
        foreach($arrayAutos as $auto) {
            $this->Add($auto);
        }
    }   
}

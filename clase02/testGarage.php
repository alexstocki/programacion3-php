<?php
/*
    Stocki Alex
    Aplicación No 18 (Auto - Garage)
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

    En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
    los métodos.
*/

include_once "Auto.php";
include_once "Garage.php";

$auto1 = new Auto("Ford", "rojo");
// $auto2 = new Auto("Ford", "azul");
// $auto3 = new Auto("Fiat", "verde", 19700.55);
// $auto4 = new Auto("Fiat", "verde", 19700.50);

// $garage = new Garage("Garage 1", 100);
$garage = Garage::Read();
$arrayAutos = Auto::Read();

$garage->LoadCarsFromFile($arrayAutos);

echo $garage->MostrarGarage();



// $garage->Add($auto1);
// $garage->Add($auto2);
// $garage->Add($auto3);
// $garage->Add($auto4);

// Garage::Save($garage);

// echo $garage->MostrarGarage();

// $garage->Remove($auto1);
// echo $garage->MostrarGarage();

// $garage->Remove($auto1);
// echo $garage->MostrarGarage();
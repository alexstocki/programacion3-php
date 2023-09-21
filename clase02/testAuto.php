<?php
/*
    Stocki Alex
    Aplicación No 17 (Auto)
    Realizar una clase llamada “Auto” que posea los siguientes atributos

    privados: _color (String)
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

    Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);

    En testAuto.php:
    ● Crear dos objetos “Auto” de la misma marca y distinto color.
    ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
    ● Crear un objeto “Auto” utilizando la sobrecarga restante.

    ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
    al atributo precio.
    ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
    resultado obtenido.
    ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
    no.
    ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
*/

include_once "Auto.php";

$auto1 = new Auto("Ford", "rojo");
// $auto2 = new Auto("Ford", "azul");

// $auto3 = new Auto("Fiat", "verde", 19700.55);
// $auto4 = new Auto("Fiat", "verde", 19700.50);

// $auto5 = new Auto("Audi", "negro", 25250.99);
// $auto6 = new Auto("Audi", "negro", 25250.99);

Auto::Save($auto1);

// $precioNuevoA4 = $auto4->AgregarImpuestos(1500);
// $precioNuevoA5 = $auto5->AgregarImpuestos(1500);
// $precioNuevoA6 = $auto6->AgregarImpuestos(1500);

// $sumaA1A2 = Auto::Add($auto1, $auto2);
// $sumaA3A4 = Auto::Add($auto3, $auto4);

// $isSameA1A2 = $auto1->Equals($auto2);
// $isSameA1A5 = $auto1->Equals($auto5);

// $autosImpares = Auto::MostrarAuto($auto1) . "<br>========<br>" . Auto::MostrarAuto($auto3) . "<br>========<br>" . Auto::MostrarAuto($auto5);

// echo "<br>Precio con impuestos de auto 4: ". $precioNuevoA4;
// echo "<br>Precio con impuestos de auto 5: ". $precioNuevoA5;
// echo "<br>Precio con impuestos de auto 6: ". $precioNuevoA6;

// echo "<br>Auto 1 + Auto 2: " . $sumaA1A2;
// echo "<br>Auto 3 + Auto 4: " . $sumaA3A4;

// echo "<br>Son iguales Auto 1 y Auto 2?: " . ($isSameA1A2 ? "Sí" : "No");
// echo "<br>Son iguales Auto 1 y Auto 5?: " . ($isSameA1A5 ? "Sí" : "No");

// echo "<br>Autos Impares:<br>" . $autosImpares;

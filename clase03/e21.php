<?php
    /*
    Aplicación No 21 ( Listado CSV y array de usuarios)
        Archivo: listado.php
        método:GET
        Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
        usuarios).
        En el caso de usuarios carga los datos del archivo usuarios.csv.
        se deben cargar los datos en un array de usuarios.
        Retorna los datos que contiene ese array en una lista

    <ul>
    <li>Coffee</li>
    <li>Tea</li>
    <li>Milk</li>
    </ul>
    Hacer los métodos necesarios en la clase usuario
    */

    include_once "Listado.php";

    echo "<h1>Usuarios</h1><br/><br/>";

    // echo Listado::ListadoHTML("usuarios");

    if(isset($_GET["listado"])){
        $listado = $_GET["listado"];
        echo Listado::ListadoHTML($listado);
    } else {
        echo "No se recibio el listado";
    }
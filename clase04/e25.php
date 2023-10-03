<?php

    /*
        Stocki Alex
        Archivo: altaProducto.php
        método:POST
        Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST ,
        crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un objeto y
        utilizar sus métodos para poder verificar si es un producto existente, si ya existe el producto se le
        suma el stock , de lo contrario se agrega al documento en un nuevo renglón
        Retorna un :
        “Ingresado” si es un producto nuevo
        “Actualizado” si ya existía y se actualiza el stock.
        “no se pudo hacer“si no se pudo hacer
        Hacer los métodos necesarios en la clase
    */

    include_once './Clases/Producto.php';

    echo '<h1>Alta de Producto</h1>';

    if(isset($_POST['codigo'], $_POST['nombre'], $_POST['tipo'], $_POST['stock'], $_POST['precio'])) {
        $producto = new Producto($_POST['codigo'], $_POST['nombre'], $_POST['tipo'], $_POST['stock'], $_POST['precio']);
        
        $listaProductos = Producto::CargarArchivo();

        if (Producto::GuardarEnArchivo($listaProductos, $producto)) {
            echo 'Se guardo exitosamente al producto: ' . $producto->nombre . '<br>';
        } else {
            echo 'No se pudo hacer - fallo el programa al intentar guardar al producto: ' . $producto->nombre . '<br>';
        }
    } else {
        echo 'Error - Parametros incorrectos <br>';
    }

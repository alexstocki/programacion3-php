<?php

    /*
        Stoci Alex
        Archivo: RealizarVenta.php
        método:POST
        Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
        POST .
        Verificar que el usuario y el producto exista y tenga stock.
        crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). carga
        los datos necesarios para guardar la venta en un nuevo renglón.
        Retorna un :
        “venta realizada”Se hizo una venta
        “no se pudo hacer“si no se pudo hacer
        Hacer los métodos necesaris en las clases
    */

    include_once './Clases/Producto.php';
    include_once './Clases/Usuario.php';

    echo '<h1>Realizar Venta</h1>';

    if(isset($_POST['codigo'], $_POST['id'], $_POST['cantidad'])) {
        $usuarios = Usuario::CargarUsuarios();
        $productos = Producto::CargarArchivo();

        $producto = Producto::BuscarPorCodigo($productos, $_POST['codigo']);
        $usuario = Usuario::BuscarPorId($usuarios, $_POST['id']);

        if ($producto !== null && $usuario !== null) {
            if ($producto->stock >= $_POST['cantidad']) {

               echo 'Venta realizada';
            } else {
                echo 'No se pudo realizar la venta - no hay stock suficiente';
            }
        } else {
            echo 'Fallo usuario o producto';
        }
    } else {
        echo 'Error - Parametros incorrectos <br>';
    }
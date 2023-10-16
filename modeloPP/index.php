<?php

    //index.php:Recibe todas las peticiones que realiza el postman, y administra a que archivo se debe incluir.
    include_once 'pizzaCarga.php';
    include_once 'pizzaConsultar.php';

    $archivo = 'Pizza.json';

    // si es metodo POST crear una pizza y guardarla, si es GET el metodo, obtener campo sabor y tipo del request
    // y consultar si existe en el archivo Pizza.json
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            if (isset($_POST['sabor']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['cantidad'])) {
                $pizza = new PizzaCarga($_POST['sabor'], $_POST['precio'], $_POST['tipo'], $_POST['cantidad']);
                if (PizzaCarga::CargarPizza($archivo, $pizza)) {
                    echo "Pizza cargada";
                } else {
                    echo "Error al cargar pizza";
                }
            } else {
                echo "Faltan datos";
            }
            break;
        case 'GET':
            if (isset($_GET['sabor']) && isset($_GET['tipo'])) {
                PizzaConsultar::ConstultarPizza($_GET['sabor'], $_GET['tipo']);
            } else {
                echo "Faltan datos";
            }
            break;
    }

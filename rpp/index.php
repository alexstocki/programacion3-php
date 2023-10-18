<?php

    include_once "PizzaCarga.php";
    include_once "PizzaConsultar.php";

    $archivo = "Pizza.json";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['sabor']) && isset($_GET['precio']) && isset($_GET['tipo']) && isset($_GET['cantidad'])) {
                PizzaCarga::Guardar($archivo, new PizzaCarga($_GET['sabor'], $_GET['precio'], $_GET['tipo'], $_GET['cantidad']));
            }
            break;
        case 'POST':
            if (isset($_POST['sabor']) && isset($_POST['tipo'])) {
                $sabor = $_POST['sabor'];
                $tipo = $_POST['tipo'];
                PizzaConsultar::ConsultarPizza($sabor, $tipo);
            }
            break;
        default:
            echo "Metodo no implementado <br>";
            break;
        }
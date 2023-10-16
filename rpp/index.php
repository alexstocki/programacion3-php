<?php

    include_once "PizzaCarga.php";
    include_once "PizzaConsultar.php";

    $archivo = "Pizza.json";
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['sabor']) && isset($_GET['precio']) && isset($_GET['tipo']) && isset($_GET['cantidad'])) {
            PizzaCarga::Guardar($archivo, new PizzaCarga($_GET['sabor'], $_GET['precio'], $_GET['tipo'], $_GET['cantidad']));
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['sabor']) && isset($_POST['tipo'])) {
            $sabor = $_POST['sabor'];
            $tipo = $_POST['tipo'];
            PizzaConsultar::ConsultarPizza($sabor, $tipo);
        }
    }
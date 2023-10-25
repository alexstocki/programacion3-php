<?php
    
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            switch ($_GET['accion']) {
                case 'alta':
                    echo "Entro en el POST - alta<br>";
                    include "ManejadorClienteAlta.php";
                    break;
                case 'consultar':
                    echo "Entro en el POST - consultar<br>";
                    include "ManejadorConsultarCliente.php";
                    break;
                case 'reservar':
                    echo "Entro en el POST - reservar<br>";
                    include "ManejadorReservaHabitacion.php";
                    break;
                case 'cancelar':
                    echo "Entro en el POST - cancelar<br>";
                    include "ManejadorCancelarReserva.php";
                    break;
                case 'ajustar':
                    echo "Entro en el POST - ajuste<br>";
                    include "ManejadorAjusteReserva.php";
                    break;
            }
            break;
        case 'GET':
            echo "Entro en el GET - consulta reservas<br>";
            include "ManejadorConsultaReservas.php";
            break;
        case 'PUT':
            echo "Entro en el PUT - modificar cliente<br>";
            include "ModificarCliente.php";
            break;
        case 'DELETE':
            echo "Entro en el DELETE - eliminar cliente<br>";
            include "ManejadorBorrarCliente.php";
            break;
        default:
            echo "No implementado<br>";
            break;
    }
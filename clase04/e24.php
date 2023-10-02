<?php

    /*
        Stocki Alex
        Archivo: listado.php
        método:GET
        Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,etc.),por ahora solo tenemos
        usuarios).
        En el caso de usuarios carga los datos del archivo usuarios.json.
        se deben cargar los datos en un array de usuarios.
        Retorna los datos que contiene ese array en una lista.
        Hacer los métodos necesarios en la clase usuario
    */
    include_once './Clases/Usuario.php';

    echo '<h1>Recibir Listado</h1>';

    if(isset($_GET['listado'])) {
        echo 'Parametro "listado" recibido correctamente';
        $archivo = fopen($_GET['listado'] . '.json', 'r');
        $usuarios = [];

        while(!feof($archivo)) {
            $data = json_decode(fgets($archivo), true);
            
            if ($data === null) {
                break;
            } 
            
            $usuario = new Usuario($data['nombre'], $data['clave'], $data['mail'], $data['id']);
            array_push($usuarios, $usuario);
        }

        if (count($usuarios) > 0) {
            echo '<ul>';
            foreach($usuarios as $usuario) {
                echo '<li>' . $usuario->MostrarUsuario() . '</li>';
            }
            echo '</ul>';
        } else {
            echo 'No hay usuarios para mostrar';
        }

        fclose($archivo);
    } else {
        echo 'No se recibio el parametro "listado"';
    }
<?php

    /*
        Recibe los datos del usuario (nombre, clave, mail) por POST
        crea un ID autoincremental (emulado, puede ser un random de 1 a 10000).
        crear un dato con la fecha de registro, toma todos los datos y utilizar sus metodos
        para poder hacer el alta, guardando datos en usuarios.json y subir la imagen al servidor en la carpeta Usuario/Fotos/
        retorna si se pudo agregar o no.
        Cada usuario se agrega en un renglon diferente al anterior.
        Hacer los metodos necesarrios en la clase usuario.
    */

    include_once "./Clases/Usuario.php";

    echo "<h1>Carga de Usuario en JSON</h1>";

    if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"])) {
        echo "Parametros correctos<br>";
        
        $usuario = new Usuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
        echo "Objeto creado<br>";
        
        if (Usuario::GuardarEnArchivo($usuario)) {
            echo "Se guardo exitosamente al usuario: " . $usuario->nombre;
        } else {
            echo "Error al intentar guardar al usuario: " . $usuario->nombre;
        }
    } else {
        echo "Error - Parametros incorrectos <br>";
    }


?>
<?php
    /*
    Stocki Alex
    
    Aplicación No 20 BIS (Registro CSV)
        Archivo: registro.php
        método:POST
        Recibe los datos del usuario(nombre, clave,mail )por POST ,
        crear un objeto y utilizar sus métodos para poder hacer el alta,
        guardando los datos en usuarios.csv.
        retorna si se pudo agregar o no.
        Cada usuario se agrega en un renglón diferente al anterior.
        Hacer los métodos necesarios en la clase usuario
    */ 
    include_once "Usuario.php";

    echo "<h1>Usuarios</h1><br/><br/>";

    if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"])){
        $usuario = new Usuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);

        if(Usuario::guardarUsuario($usuario)){
            echo "Se guardo el usuario en main<br>";
        } else {
            echo "No se pudo guardar el usuario en main";
        }
    } else {
        echo "No se recibieron los datos necesarios";
    }
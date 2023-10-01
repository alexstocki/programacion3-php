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

    // carpeta donde se almacena la foto
    $carpeta_archivos = 'Usuarios/Fotos/';

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

    // Manejo de carga y transferencia de foto
    // Datos del archivo enviado por POST
    $nombre_archivo = $_FILES['archivo']['name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];

    // Ruta destino, carpeta + nombre del archivo que quiero guardar
    $ruta_destino = $carpeta_archivos . $nombre_archivo;

    // Realizamos las validaciones del archivo
    if (!((strpos($tipo_archivo, 'png') || strpos($tipo_archivo, 'jpeg')) && ($tamano_archivo < 300000))) {
        echo "La extension o el size de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 100 Kb maximo.</td></tr></table>";
    } else {
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_destino)) {
            echo "El archivo ha sido cargado correctamente";
        } else {
            echo "Ocurrio algun error al subir el fichero. No pudo guardarse";
        }
    }


?>
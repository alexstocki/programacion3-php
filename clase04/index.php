<?php

    // necesito un form para subir una foto a Usuarios/Fotos


    // include_once "./Clases/Usuario.php";

    echo "<h1>Carga de Usuario en JSON</h1>";

    // Definimos en que carpeta vamos a guardar los archivos
    // La carpeta debe estar creada
    $carpeta_archivos = 'Usuarios/Fotos/';

    // Datos del archivo enviado por POST
    $nombre_archivo = $_FILES['archivo']['name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];

    // Ruta destino, carpeta + nombre del archivo que quiero guardar
    $ruta_destino = $carpeta_archivos . $nombre_archivo;

    echo $ruta_destino;
    echo "<br>";
    echo $nombre_archivo;
    echo "<br>";
    echo $tipo_archivo;
    echo "<br>";
    echo $tamano_archivo;
    echo "<br>";

    // Realizamos las validaciones del archivo
    if (!((strpos($tipo_archivo, 'png') || strpos($tipo_archivo, 'jpeg')) && ($tamano_archivo < 200000))) {
        echo "La extension o el size de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 200 Kb maximo.</td></tr></table>";
    } else {
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_destino)) {
            echo "El archivo ha sido cargado correctamente";
        } else {
            echo "Ocurrio algun error al subir el fichero. No pudo guardarse";
        }
    }
?>
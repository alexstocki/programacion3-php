<?php
    include_once "ConsultarCliente.php";
    include_once "ManejadorArchivo.php";

    $directorioInicial = "ImagenesDeClientes/2023/";
    $directorioFinal = "ImagenesBackupClientes/2023/";
    
    class BorrarCliente {
        public static function Borrar($archivo, $cliente) {
            $cliente->estado = "ELIMINADO";
            if (ConsultarCliente::ModificarCliente($archivo, $cliente)) {
                $nombreImagen = $cliente->id . strtoupper(substr($cliente->tipoCliente, 0, 2));
                if (ManejadorArchivo::BorrarImagen(BorrarCliente::directorioInicial, BorrarCliente::directorioFinal, $nombreImagen)) {
                    return true;
                } 
                else {
                    return false;
                }
            }
        }
    }
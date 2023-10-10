<?php

require_once 'Persona.php';

class PersonaController {

    public function InsertarPersona($nombre, $apellido, $clave, $mail, $localidad) {
        $persona = new Persona();
        $persona->nombre = $nombre;
        $persona->apellido = $apellido;
        $persona->clave = $clave;
        $persona->mail = $mail;
        $persona->localidad = $localidad;

        return $persona->InsertarPersonaParametros();
    }

    public function modificarPersona($id, $nombre, $apellido, $clave, $mail, $localidad) {
        $persona = new Persona();
        $persona->id = $id;
        $persona->nombre = $nombre;
        $persona->apellido = $apellido;
        $persona->clave = $clave;
        $persona->mail = $mail;
        $persona->localidad = $localidad;

        return $persona->ModificarPersonaParametros();
    }

    public function borrarPersona($id) {
        $persona = new Persona();
        $persona->id = $id;
        
        return $persona->borrarPersona();
    }

    public function listarPersonas() {
        return Persona::TraerTodasLasPersonas();
    }

    public function buscarPersonaPorId($id) {
        $persona = Persona::TraerUnaPersona($id);
        if($persona === false) { // Validamos que exista y si no mostramos un error
            $persona =  ['error' => 'No existe ese id'];
        }
        return $persona;
    }

    public function buscarPersonaPorIdYMail($id, $mail) {
        return Persona::TraerPersonaMail($id, $mail);
    }
}
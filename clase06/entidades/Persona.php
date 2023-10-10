<?php

    include './database/AccesoDb.php';

    class Persona{
        $nombre;
        $apellido;
        $clave;
        $mail;
        $localidad;

        function __construct($nombre, $apellido, $clave, $mail, $localidad) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->clave = $clave;
            $this->mail = $mail;
            $this->localidad = $localidad;
        }

        public function InsertarPersona() {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("INSERT INTO personas (nombre, apellido, clave, mail, localidad) 
                                                            VALUES ('$this->nombre', '$this->apellido', '$this->clave', '$this->mail', '$this->localidad')");
            $consulta->execute();

            return $accesoDataBase->RetornarUltimoIdInsertado();
        }

        public function InsertarPersonaParametros() {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("INSERT INTO personas (nombre, apellido, clave, mail, localidad) VALUES(:nombre,:apellido,:clave,:mail,:localidad)");
            $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
            $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
            $consulta->execute();

            return $accesoDataBase->RetornarUltimoIdInsertado();
        }

        public static function TraerTodasLasPersonas() {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("SELECT nombre, apellido FROM personas");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_CLASS, "persona");
        }
    
        public static function TraerUnaPersona($id) {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("SELECT nombre, persona FROM personas WHERE id = $id");
            $consulta->execute();
            $personaBuscada = $consulta->fetchObject('persona');

            return $personaBuscada;
        }
    
        public static function TraerPersonaMail($id, $mail) {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("SELECT nombre, apellido FROM personas WHERE id=? AND mail=?");
            $consulta->execute(array($id, $mail));
            $personaBuscada = $consulta->fetchObject('persona');

            return $personaBuscada;
        }
    
        public static function TraerPersonaMailParamNombre($id, $mail) {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("SELECT nombre, apellido FROM persona WHERE id=:id AND mail=:mail");
            $consulta->bindValue(':id', $id, PDO::PARAM_INT);
            $consulta->bindValue(':mail', $mail, PDO::PARAM_STR);
            $consulta->execute();
            $personaBuscada = $consulta->fetchObject('persona');

            return $personaBuscada;
        }
    
        public static function TraerPersonaMailParamNombreArray($id, $mail)
        {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("SELECT nombre, apellido FROM personas WHERE id=:id AND mail=:mail");
            $consulta->execute(array(':id' => $id, ':mail' => $mail));
            $consulta->execute();
            $personaBuscada = $consulta->fetchObject('persona');

            return $personaBuscada;
        }
    
        public function ModificarPersona() {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("
                    UPDATE personas 
                    SET nombre='$this->nombre',
                    apellido='$this->apellido',
                    clave='$this->clave',
                    mail='$this->mail',
                    localidad='$this->localidad'
                    WHERE id='$this->id'
                ");

            return $consulta->execute();
        }
    
        public function ModificarPersonaParametros() {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("
                    UPDATE personas 
                    SET nombre=:nombre,
                    apellido=:apellido,
                    mail=:mail
                    localidad=:localidad
                    WHERE id=:id
                ");
            $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
            $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
            $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);

            return $consulta->execute();
        }
    
        public function BorrarPersona() {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("
                    DELETE 
                    FROM personas 				
                    WHERE id=:id
                ");
            $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->rowCount();
        }
    
        public static function BorrarPersonaPorMail($mail) {
            $accesoDataBase = AccesoDb::RetornarObjetoAcceso();
            $consulta = $accesoDataBase->RetornarConsulta("
                    DELETE 
                    FROM personas 				
                    WHERE mail=:mail");
            $consulta->bindValue(':mail', $mail, PDO::PARAM_STR);
            $consulta->execute();

            return $consulta->rowCount();
        }
    }
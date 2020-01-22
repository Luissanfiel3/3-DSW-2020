<?php

class User
{
    /**
     * Transfer Object
     * Clase que contiene los campos de la base de datos  Usuarios en usuario_db
     */
    private $id;
    private $nombre;
    private $edad;
    private $telefono;
    private $email;
    private $created_at;
    private $updated_at;

    public function __construct($id, $nombre, $edad, $telefono, $email, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getId(){
        return $this->id;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function getCreated_At(){
        return $this->created_at;
    }

    public function getUpdated_At(){
        return $this->updated_at;
    }

}

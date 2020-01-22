<?php 

class Cursos {
    private $id;
    private $nombre;
    private $lugar;
    private $modalidad;
    private $profesor_id;
    private $fecha_inicio;
    private $plazas;


    public function __construct($id, $nombre, $lugar, $modalidad, $profesor_id, $fecha_inicio, $plazas)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->lugar = $lugar;
        $this->modalidad = $modalidad;
        $this->profesor_id = $profesor_id;
        $this->fecha_inicio = $fecha_inicio;
        $this->plazas = $plazas;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getLugar(){
        return $this->lugar;
    }

    public function getModalidad(){
        return $this->modalidad;
    }
    
    public function getProfesor_Id(){
        return $this->profesor_id;
    }

    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }
    public function getPlazas(){
        return $this->plazas;
    }
}
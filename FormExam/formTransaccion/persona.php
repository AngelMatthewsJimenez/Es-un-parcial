<?php

class persona
{

    public $id;
    public $fecha_hora;
    public $monto;
    public $descripcion;

    private $utilities;

    public function __construct()
    {
        $this->utilities = new Utilities();

    }

    public function inicializeData($id, $fecha_hora, $monto, $descripcion)
    {

        $this->id = $id;
        $this->fecha_hora = $fecha_hora;
        $this->monto = $monto;
        $this->descripcion = $descripcion;
    }

    public function set($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

    }
}
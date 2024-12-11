<?php

namespace Race\modelos;

class Piloto {

    private $id;
    private $nombre;
    private $escuderia;

    public function __construct($id="", $nombre="", $escuderia="") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->escuderia = $escuderia;
    }

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed|string $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed|string
     */
    public function getEscuderia()
    {
        return $this->escuderia;
    }

    /**
     * @param mixed|string $escuderia
     */
    public function setEscuderia($escuderia): void
    {
        $this->escuderia = $escuderia;
    }

    public function __toString()
    {
        return $this->nombre." ".$this->escuderia;
    }


}

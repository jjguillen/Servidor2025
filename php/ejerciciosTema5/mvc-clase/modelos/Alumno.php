<?php

    namespace Modulos\modelos;

    class Alumno {

        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $edad;
        private $localidad;
        private $telefono;

        /**
         * @param $id
         * @param $nombre
         * @param $apellidos
         * @param $email
         * @param $edad
         * @param $localidad
         * @param $telefono
         */
        public function __construct($id="", $nombre="", $apellidos="", $email="", $edad="", $localidad="", $telefono="")
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->edad = $edad;
            $this->localidad = $localidad;
            $this->telefono = $telefono;
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
        public function getApellidos()
        {
            return $this->apellidos;
        }

        /**
         * @param mixed|string $apellidos
         */
        public function setApellidos($apellidos): void
        {
            $this->apellidos = $apellidos;
        }

        /**
         * @return mixed|string
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed|string $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }

        /**
         * @return mixed|string
         */
        public function getEdad()
        {
            return $this->edad;
        }

        /**
         * @param mixed|string $edad
         */
        public function setEdad($edad): void
        {
            $this->edad = $edad;
        }

        /**
         * @return mixed|string
         */
        public function getLocalidad()
        {
            return $this->localidad;
        }

        /**
         * @param mixed|string $localidad
         */
        public function setLocalidad($localidad): void
        {
            $this->localidad = $localidad;
        }

        /**
         * @return mixed|string
         */
        public function getTelefono()
        {
            return $this->telefono;
        }

        /**
         * @param mixed|string $telefono
         */
        public function setTelefono($telefono): void
        {
            $this->telefono = $telefono;
        }



    }

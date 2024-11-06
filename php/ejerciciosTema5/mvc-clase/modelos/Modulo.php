<?php

    namespace Modulos\modelos;

    class Modulo {

        private $id;
        private $nombre;
        private $ciclo;
        private $curso;
        private $horas;

        /**
         * @param $id
         * @param $nombre
         * @param $ciclo
         * @param $curso
         * @param $horas
         */
        public function __construct($id="", $nombre="", $ciclo="", $curso="", $horas="")
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->ciclo = $ciclo;
            $this->curso = $curso;
            $this->horas = $horas;
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
        public function getCiclo()
        {
            return $this->ciclo;
        }

        /**
         * @param mixed|string $ciclo
         */
        public function setCiclo($ciclo): void
        {
            $this->ciclo = $ciclo;
        }

        /**
         * @return mixed|string
         */
        public function getCurso()
        {
            return $this->curso;
        }

        /**
         * @param mixed|string $curso
         */
        public function setCurso($curso): void
        {
            $this->curso = $curso;
        }

        /**
         * @return mixed|string
         */
        public function getHoras()
        {
            return $this->horas;
        }

        /**
         * @param mixed|string $horas
         */
        public function setHoras($horas): void
        {
            $this->horas = $horas;
        }



    }

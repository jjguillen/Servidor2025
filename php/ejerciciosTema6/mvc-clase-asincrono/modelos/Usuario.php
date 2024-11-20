<?php

    namespace Modulos\modelos;

    class Usuario {
        private $id;
        private $email;
        private $password;
        private $nombre;

        /**
         * @param $id
         * @param $email
         * @param $password
         * @param $nombre
         */
        public function __construct($id="", $email="", $password="", $nombre="")
        {
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->nombre = $nombre;
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
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed|string $password
         */
        public function setPassword($password): void
        {
            $this->password = $password;
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




    }
<?php

    spl_autoload_register(function ($clase) {
        include_once './' . $clase . '.php';
    });

    class UsuarioBanco {

        private $nombre;
        private $cuenta;
        private $tarjetas;

        /**
         * @param $nombre
         * @param $cuenta
         */
        public function __construct($nombre, $cuenta)
        {
            $this->nombre = $nombre;
            $this->cuenta = $cuenta;
            $this->tarjetas = array();
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre): void
        {
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getCuenta()
        {
            return $this->cuenta;
        }

        /**
         * @param mixed $cuenta
         */
        public function setCuenta($cuenta): void
        {
            $this->cuenta = $cuenta;
        }

        public function getTarjetas(): array
        {
            return $this->tarjetas;
        }

        public function setTarjetas(array $tarjetas): void
        {
            $this->tarjetas = $tarjetas;
        }

        public function addTarjeta(Tarjeta $tarjeta) {
            array_unshift($this->tarjetas, $tarjeta);
        }

        public function mostrarInfoTarjetas() {
            foreach ($this->tarjetas as $tarjeta) {
                echo "Saldo: ".$tarjeta->getSaldo()."<br>";
                echo "Deuda: ".$tarjeta->calcularDeuda()."<br>";
            }
        }

        public function __toString()
        {
            return $this->nombre." - ".$this->cuenta;
        }


    }

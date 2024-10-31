<?php

    abstract class Tarjeta {

        protected $numTarjeta;
        protected $saldo;

        /**
         * @param $numTarjeta
         * @param $saldo
         */
        public function __construct($numTarjeta, $saldo)
        {
            $this->numTarjeta = $numTarjeta;
            $this->saldo = $saldo;
        }

        /**
         * @return mixed
         */
        public function getNumTarjeta()
        {
            return $this->numTarjeta;
        }

        /**
         * @param mixed $numTarjeta
         */
        public function setNumTarjeta($numTarjeta): void
        {
            $this->numTarjeta = $numTarjeta;
        }

        /**
         * @return mixed
         */
        public function getSaldo()
        {
            return $this->saldo;
        }

        /**
         * @param mixed $saldo
         */
        public function setSaldo($saldo): void
        {
            $this->saldo = $saldo;
        }


        /**
         * Para incrementar el saldo de la tarjeta
         * @param $cantidad
         * @return void
         */
        public function addSaldo($cantidad) {
            $this->cantidad += $cantidad;
        }

        public abstract function retirarSaldo($cantidad);

        public abstract function calcularDeuda();



    }


?>
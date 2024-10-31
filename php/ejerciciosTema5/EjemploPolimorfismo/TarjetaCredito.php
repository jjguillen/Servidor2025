<?php

    spl_autoload_register(function ($clase) {
        include_once './' . $clase . '.php';
    });

    class TarjetaCredito extends Tarjeta {

        private $tipoDeInteres;
        private $deuda;

        /**
         * @return mixed
         */
        public function getTipoDeInteres()
        {
            return $this->tipoDeInteres;
        }

        /**
         * @param mixed $tipoDeInteres
         */
        public function setTipoDeInteres($tipoDeInteres): void
        {
            $this->tipoDeInteres = $tipoDeInteres;
        }

        public function getDeuda(): int
        {
            return $this->deuda;
        }

        public function setDeuda(int $deuda): void
        {
            $this->deuda = $deuda;
        }


        public function __construct($numTarjeta, $saldo, $tipoDeInteres)
        {
            parent::__construct($numTarjeta, $saldo);
            $this->tipoDeInteres = $tipoDeInteres;
            $this->deuda = 0;
        }


        public function retirarSaldo($cantidad)
        {
            if (($this->saldo - $cantidad) >= 0) {
                $this->saldo -= $cantidad;
            } else {
                $this->deuda = ($this->saldo - $cantidad) * -1;
                $this->saldo = 0;
            }
        }

        public function calcularDeuda()
        {
            return $this->deuda * (1 + $this->tipoDeInteres/100);
        }
    }


    ?>

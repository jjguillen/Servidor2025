<?php

    spl_autoload_register(function ($clase) {
        include_once './' . $clase . '.php';
    });


    class TarjetaDebito extends Tarjeta {

        private $limite;

        public function __construct($numTarjeta, $saldo, $limite)
        {
            parent::__construct($numTarjeta, $saldo);
            $this->limite = $limite;
        }

        /**
         * @return mixed
         */
        public function getLimite()
        {
            return $this->limite;
        }

        /**
         * @param mixed $limite
         */
        public function setLimite($limite): void
        {
            $this->limite = $limite;
        }


        /**
         * Solo puedo retirar dinero si es menos cantidad del límite, y solo se puede
         * retirar una cantidad que no te deje el saldo a menos de 0
         * @param $cantidad
         * @return void
         */
        public function retirarSaldo($cantidad)
        {
            if ( ($cantidad <= $this->limite) && (($this->saldo - $cantidad) >= 0) ) {
                $this->saldo -= $cantidad;
            }
        }

        public function calcularDeuda()
        {
            return 0;
        }
    }





?>

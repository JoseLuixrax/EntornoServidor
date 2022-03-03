<?php
    /**
     * Cuenta numero de instancias el numero de clase
     */
    class Contador{
        private $numero;
        private static $instance;

        public function __construct(){
            $this->numero=0;
            self::$instance++;
        }

        public function count(){
            return $this->numero++;
        }

        public static function countInstance(){
            return self::$instance;
        }

        public function toString(){
            return 'Hay '.$this->numero.' contador';
        }
    }

?>
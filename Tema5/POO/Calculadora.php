<?php

/**
 * Plantear una clase Calculadora que contenga cuatro métodos estáticos (sumar, restar, multiplicar y dividir)
 *  que reciben dos valores (los operandos).
 * @author Tomas
 */

    class Calculadora{

        public static function sumar($operando1, $operando2){
            return $operando1 + $operando2;
        }

        public static function restar($operando1, $operando2){
            return $operando1 - $operando2;
        }

        public static function multiplicar($operando1, $operando2){
            return $operando1 * $operando2;
        }

        public static function dividir($operando1, $operando2){
            return $operando1 / $operando2;
        }
    }
    
    echo "SUMA: " . Calculadora::sumar(5, 10) . "<br>";
    echo "RESTA: " . Calculadora::restar(10, 5) . "<br>";
    echo "MULTIPLICACION: " . Calculadora::multiplicar(5, 10) . "<br>";
    echo "DIVISION: " . Calculadora::dividir(10, 5) . "<br>";


?>
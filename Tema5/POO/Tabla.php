<?php

/**
 *  Confeccionar una clase Tabla que permita indicarle en el constructor la cantidad de filas y columnas. 
 * Definir otra responsabilidad que podamos cargar un dato en una determinada fila y columna. 
 * Finalmente debe mostrar los datos en una tabla HTML.
 * @author Tomas
 */

    class Tabla{
        private $filas;
        private $columnas;
        private $datos=array();

        public function __construct($filas,$columnas){
            $this->filas=$filas;
            $this->columnas=$columnas;
        }

        public function addDato($fila,$columna,$dato){
            $this->datos[$fila][$columna]=$dato;
        }

        public function mostrarDatos(){
            echo "<table border=1>";
            for($i=0;$i<$this->filas;$i++){
                echo "<tr>";
                for($j=0;$j<$this->columnas;$j++){
                    echo "<td>".$this->datos[$i][$j]."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }


?>
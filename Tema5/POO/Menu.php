<?php

/**
 * Confeccionar una clase Menu. 
 * Permitir añadir la cantidad de opciones que necesitemos. 
 * Mostrar el menú en forma horizontal o vertical (según que método llamemos).
 * @author Tomas
 */

    class Menu{
        private $opciones=array();
        private $orientacion;

        public function __construct($opciones,$orientacion){
            $this->opciones=$opciones;
            $this->orientacion=$orientacion;
        }

        public function mostrar(){
            if($this->orientacion=="horizontal"){
                foreach($this->opciones as $opcion){
                    echo $opcion." ";
                }
            }else{
                echo "<ul>";
                foreach($this->opciones as $opcion){
                    echo "<li>".$opcion."</li>";
                }
                echo "</ul>";
            }
        }

        public function addOpcion($opcion){
            $this->opciones[]=$opcion;
        }
    }

    $opciones=array("Inicio","Contacto","Nosotros","Productos","Galeria","Blog");
    $menu=new Menu($opciones,"vertical");
    $menu->addOpcion("Nueva opción");
    $menu->mostrar();
    $menu=new Menu($opciones,"horizontal");
    $menu->addOpcion("Nueva opción");
    $menu->mostrar();


?>
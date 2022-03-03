<?php 

/**
 * Escribir 3 numeros de forma ordenada
 * 
 * @author Tomas
 */ 

$num1=1;
$num2=2;
$num3=3;
    
    echo "Los numeros ordenados son: "; 
    if($num1>$num2){
        if($num1>$num3){
            echo 'num1: '.$num1.'</br';
            echo 'num2: '.$num2.'</br';
            echo 'num3: '.$num3.'</br';
        }else{
            echo 'num3: '.$num3.'</br';
            echo 'num1: '.$num1.'</br';
            echo 'num2: '.$num2.'</br';
        }
    }else{
        if($num2>$num3){
            echo 'num2: '.$num2.'</br';
            echo 'num3: '.$num3.'</br';
            echo 'num1: '.$num1.'</br';
        }else{
            echo 'num3: '.$num3.'</br';
            echo 'num2: '.$num2.'</br';
            echo 'num1: '.$num1.'</br';
        }
    }

?>
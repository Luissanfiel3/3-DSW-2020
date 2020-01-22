<?php

$resultado ="";
$numHora = $_POST;
       function Calcular(){
        global $numHora , $resultado;
        foreach($numHora as $valor){
            if ($valor > 6 && $valor <= 12) {
               $resultado = "Buenos Días";
            } elseif($valor >= 13 && $valor <= 20) {
                $resultado ="Buenas Tardes";
            }elseif($valor >= 21 && $valor <=23 && $valor <=6 || $valor === 00 ){
                $resultado ="Buenas Noches";
            }
            else {
                $resultado ="Formato de Hora no admitido";
            }
            
            // if ($a > $b) {
            //     echo "a es mayor que b";
            //     } elseif ($a == $b) {
            //     echo "a es igual que b";
            //     } else {
            //     echo "a es menor que b";
            //     }
            
            echo $resultado;
        }
    }
Calcular();





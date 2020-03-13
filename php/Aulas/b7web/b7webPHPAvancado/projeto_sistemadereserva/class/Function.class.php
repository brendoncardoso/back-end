<?php
    $function = new wFunction();
    $dias_da_semana = $function->getDiaDaSemana();
    /* 
    * Description of Function
    * 
    * @author Brendon
    */

    class wFunction {
        public function dateFormat($data){
            $data = new DateTime($data); 
            echo $data->format('d/m/Y');
        }
        
        public function weekFormat($dias){
            switch ($dias){
                case 0: $dia_da_semana = "Dom"; break; 
                case 1: $dia_da_semana = "Seg"; break; 
                case 2: $dia_da_semana = "Ter"; break; 
                case 3: $dia_da_semana = "Qua"; break; 
                case 4: $dia_da_semana = "Qui"; break; 
                case 5: $dia_da_semana = "Sex"; break; 
                case 6: $dia_da_semana = "Sab"; break; 
                default;
            }
            
            return $dia_da_semana;
        }
        
        public function getDiaDaSemana(){
            for($x = 0; $x <= 6; $x++){
                $arrayDiaDaSemana[] = $x;                
            }
            
            return $arrayDiaDaSemana;
        }
    }

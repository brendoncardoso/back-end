<?php

    Class Tempo {
        private $dias;

        public function __construct($dias){
            $this->dias = $dias;
        }

        public function diferenca(){
            $datetime1 = date_create($this->dias);
            $datetime2 = date_create(date('Y-m-d'));
            $interval = date_diff($datetime1, $datetime2);
            
            return $interval->format('%a');   
        }
    }
?>
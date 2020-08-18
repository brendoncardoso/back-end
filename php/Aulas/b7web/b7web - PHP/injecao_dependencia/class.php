<?php 
    interface Matematica {
        public function somar($x, $y);
    }

    class Soma implements Matematica {
        public function somar($x, $y){
            return $x + $y;
        }
    }

    class Tabuada implements Matematica {
        private $class;

        public function __construct($obj){
            $this->class = $obj;
        }

        public function somar($x, $y){
            return $this->class->somar($x, $y);
        }
    }

    $mat = new Tabuada(new Soma());
    echo $mat->somar(5, 5);
?>
<?php 

interface Segury {
    public function numbers($x, $operation, $y);
    public function calculo();
}

Class Calculo implements Segury{
    private $x;
    private $y;
    private $operation;

    public function numbers($x, $operation, $y){
        $this->x = $x;
        $this->y = $y;
        $this->operation = $operation;
        return $this;
    }

    public function calculo(){
        switch($this->operation){
            case '+' : return $this->x + $this->y; break;
            case '-' : return $this->x - $this->y; break;
            case '*' : return $this->x * $this->y; break;
            case '/' : return $this->x / $this->y; break;
        }
    }
}

$cal = new Calculo();
echo $cal->numbers(2, '*', 2)->calculo();

?>
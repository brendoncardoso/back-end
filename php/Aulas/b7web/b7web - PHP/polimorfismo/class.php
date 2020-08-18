<?php 

interface Forma {
    public function getTipo();
    public function getArea();
}


class Quadrado implements Forma {
    private $altura;
    private $largura;

    public function __construct($l, $a){
        $this->altura = $l;
        $this->largura = $a;
    }

    public function getTipo(){
        return 'Quadrado';
    }

    public function getArea(){
        return $this->altura * $this->largura;
    }
}

$quadrado = new Quadrado(5, 5);

$objetos = [
    $quadrado
];

foreach($objetos as $objeto){
    $area = $quadrado->getArea();

    echo "Area: ".$area;
}

?>
<?php
    Class Calculo{

        /*
        *  Função somar
        *  
        *  Essa Função vai pegar um Valor X e Somar com um Valor de Y
        *
        *  @package ControleDeEstoque
        *  @author Brendon <brendon.carvalho@f71.com.br>
        *  @param $x float É o primeiro valor
        *  @param $y float É o segundo valor
        *  @return int
        */

        public function somar($x, $y){
            return ($x +  $y);
        }

        /*
        *  Função subtrair
        *
        *  Essa Função vai pegar um Valor X e Subtrair com um Valor de Y  
        *
        *  @package ControleDeEstoque
        *  @author Brendon <brendon.carvalho@f71.com.br
        *  @param $x float É o primeiro Valor
        *  @param $y float É o segundo Valor
        *  @return int
        */

        public function subtrair($x, $y){
            return ($x - $y);
        }

        /*
        * Função multiplicar 
        * 
        * Essa função vai pegar um Valor X e Multiplicar com um valor de Y 
        * 
        * @package ControleDeEstoque
        * @author Brendon <brendon.carvalho@f71.com.br>
        * @param $x float Esse é o primeiro valor
        * @param $y float Esse é o segundo valor 
        * @return int
        */

        public function multiplicar($x, $y){
            return ($x * $y);
        }

        /*
        * Função dividir
        *
        * Essa função vai pegar o Valor X e Dividir com um Valor de Y
        *
        * @package ControleDeEstoque
        * @author Brendon <brendon.carvalho@f71.com.br>
        * @param $x float Esse é primeiro valor
        * @param $y float Esse é segundo valor
        * @return int
        */

        public function dividir($x, $y){
            return ($x / $y);
        }
    }
?>
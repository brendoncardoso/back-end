<?php

    Class Pessoa {
        private $nome;
        private $data_nascimento;

        public function __construct($nome, $data_nascimento){
            $this->nome = $nome;
            $this->data_nascimento = $data_nascimento;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getIdade(){
            $dia_atual = date('Y-m-d');
            $dia_mes_aniversario = date('m-d', strtotime($this->data_nascimento));
            $ano_aniversario = date('Y', strtotime($this->data_nascimento));
            $ano = date('Y');
            $dia_aniversario = $ano."-".$dia_mes_aniversario;
            if($dia_atual < $dia_aniversario){
                return $ano - $ano_aniversario - 1;
            }else{
                return $ano - $ano_aniversario;
            }
        }
    }
?>
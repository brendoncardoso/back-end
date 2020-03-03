<?php

    class Lang {
        
        private $db;
        
        public function __construct() {
            $this->db = new PDO("mysql:dbname=projeto_multilinguagem; host=localhost;", "root", "");
        }
        
        public function selectLang(){
            
        }
        
        public function insertLang(){
            
        }
        
        public function updateLang(){
            
        }
        
        public function deleteLang(){
            
        }
    }
<?php

    $obj_translation = new Translation();
//    $obj_linguage->setTranslation(); 
    
    class Translation { 
        
        private $lin;
        private $ini;
//        private $item;
        
        public function __construct() {
            if(isset($_GET['lang']) && !empty($_GET['lang'])){
                if(file_exists("lang/".$_GET['lang'].".ini")){
                    $this->lin = $_SESSION['lang'];
                }else{
                    $this->lin = "en";
                }
            }else{
                $this->lin = "en";
            }
            
            $this->ini = parse_ini_file("lang/".$this->lin.".ini");
        }
        
        public function getLinguage(){
            return $this->lin;
        }
        
//        public function setTranslation(){
//            $item = "BUY";
//            $this->item = $item;
//        }
        
        public function getTranslation($word, $return = FALSE){
//            if(isset($this->ini[$this->item])){
//                $word = $this->ini[$this->item];
//            }
//            
//            if($return){
//                return $word;
//            }else{
//                echo $word;
//            }      
            
            $word = strtoupper($word);
            if(isset($this->ini[$word])){
                $text = $this->ini[$word];
            }
             
            if($return){
                return $text;
            }else{
                echo $text;
            }
        }
            
    }



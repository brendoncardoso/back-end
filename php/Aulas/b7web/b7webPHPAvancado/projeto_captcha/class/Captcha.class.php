<?php
    $captcha = new Captcha();
    
    /* 
     * Description of Captcha.class
     * 
     * @author Brendon
     */
    
    class Captcha {
        private $restrit;
        
        public function verificaCaptcha($codigo){
            if($codigo == $_SESSION['captcha']){
                header('location: index.php');
            }else{
                $rand = rand(1000, 9999);
                $_SESSION['captcha'] = $rand;   
            }
        }
    }

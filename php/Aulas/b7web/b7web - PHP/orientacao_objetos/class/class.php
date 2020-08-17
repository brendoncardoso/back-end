<?php 
    $post = new Post();
    $foto = new Foto(61);
    
    class Post {
        public $id;
        public $likes;
        public $text;
        public $author;

        public function setAuthor($n){
            if(strlen($n) >= 3){
                $this->author = $n;
            }else{
                $this->author = NULL;
            }
        }

        public function getAuthor(){
            return ucfirst($this->author);
        }

        public function setLikes($numbers){
            $this->likes = $numbers;
        }

        public function getLikes(){
            return $this->likes;
        }
        

    }

    class Foto extends Post {
        public $url;

        public function __construct($id = 0){ 
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setUrl($url){
            $this->url = $url;
        }

        public function getUrl(){
            return $this->url;
        }


    }

    echo "ID: ".$foto->getId()."</br>";
    $foto->setLikes(25);
    echo "Likes: ".$foto->getLikes()."</br>";
    $foto->setUrl("www.facebook.com.br/sdasdawdwaklçls")."</br>";
    echo "Facebook: ".$foto->getUrl();
?>
<?php
namespace src\handlers;
use src\models\Post;
use src\models\User;
use src\models\UserRelation;

class PostHandler {

    public $post;
    public $postUserRelation;
    public $id_usuario;
    public $tipo;
    public $body;

    public function __construct(){
        $this->post = new Post();
        $this->user = new User();
        $this->postUserRelation = new UserRelation();
    }

    public function addNewPost($id_usuario, $tipo, $body){

        $this->post->insert([
            'id_usuario' => $id_usuario,   
            'tipo' => $tipo,
            'criado_em' => date('Y-m-d H:i:s'),
            'body' => $body,         
        ])->table('posts')->execute();

    }

    public function _getFeedToObject($postList, $id_usuario){
        $posts = [];

        foreach($postList as $postItem){
            $getCollection = new Post();
            $getCollection->id = $postItem['id'];
            $getCollection->id_usuario = $postItem['id_usuario'];
            $getCollection->tipo = $postItem['tipo'];
            $getCollection->criado_em = $postItem['criado_em'];
            $getCollection->body = $postItem['body'];
            $getCollection->mine = false;

            if($postItem['id_usuario'] == $id_usuario){
                $getCollection->mine = true;
            }

            $userList = 
                $this->user
                ->select()
                ->table('usuarios')
                ->where('id', $postItem['id_usuario'])
                ->one();

            $getCollection->user = new User();
            $getCollection->user->id = $userList['id'];
            $getCollection->user->nome = $userList['nome'];
            $getCollection->user->foto = $userList['foto'];

            $getCollection->countLike = 0;
            $getCollection->liked = 0;
            
            $getCollection->comments = [];
            $posts[] = $getCollection;
        }

        return $posts;
    }

    public function getUserFeed($id_usuario, $page){
        $perPage = 2;

        $postList = 
            $this->post
            ->select()
            ->table('posts')
            ->where('id_usuario', $id_usuario)
            ->page($page, $perPage)
            ->orderBy('criado_em', 'DESC')
            ->get();

        $total = 
            $this->post
            ->select()
            ->table('posts')
            ->where('id_usuario', $id_usuario)
            ->count();

        $pageCount = ceil($total/$perPage);

        $posts = self::_getFeedToObject($postList, $id_usuario);

        return [
            'posts' => $posts,
            'pageCount' => $pageCount
        ];
    }

    public function getHomeFeed($id_usuario, $page){

        $perPage = 2;

        $usersList = $this->postUserRelation->select()->table('usuarios_relacao')->where('user_from', $id_usuario)->get();
        $array = [];

        foreach($usersList as $list){
            $array[] = $list['user_to'];
        }

        $array[] = $id_usuario;

        $postList = $this->post
            ->select()
            ->table('posts')
            ->where('id_usuario', 'in', $array)
            ->orderBy('criado_em', 'desc')
            ->page($page, $perPage)
            ->get();

        $total = $this->post
            ->select()
            ->table('posts')
            ->where('id_usuario', 'in', $array)
            ->count();

        $pageCount = ceil($total/$perPage);

        $posts = self::_getFeedToObject($postList, $id_usuario);

        return [
            'posts' => $posts,
            'pageCount' => $pageCount
        ];
    }

    public function getPerfilPhotos($id){
        $getPhotos = 
            $this->user
            ->select()
            ->table('posts')
            ->where('id_usuario', $id)
            ->where('tipo', 'photo')
            ->get();

        $photos = [];

        foreach($getPhotos as $valuePhotos){
            $newPost = new Post();
            $newPost->id = $valuePhotos['id'];
            $newPost->criado_em = $valuePhotos['criado_em'];
            $newPost->tipo = $valuePhotos['tipo'];
            $newPost->body = $valuePhotos['body'];

            $photos[] = $newPost;
        }

        return $photos;
    }
}
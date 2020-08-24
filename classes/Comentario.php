<?php

class Comentario{
    private $data;
    private $comentario;
    private $noticia;
    private $usuario;
    private $id;

    public function setDatad($data){
        $this->data=$data;
    }
    
    public function getData(){
        return $this->data;
    }

    public function setComentario($comentario){
        $this->comentario=$comentario;
    }
    
    public function getComentario(){
        return $this->comentario;
    }

    

    public function setNoticia($noticia){
        $this->noticia=$noticia;
    }
    
    public function getNoticia(){
        return $this->noticia;
    }

    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }

    public function setId($id){
        $this->id=$id;
    }
    
    public function getId(){
        return $this->id;
    }

}
<?php


class News
{
    private $id;
    private $titre;
    private $contenu;
    private $date;

    public function __construct($id,$titre,$contenu,$date)
    {
        $this->id=$id;
        $this->titre=$titre;
        $this->contenu=$contenu;
        $this->date=$date;
    }

    public function getId(){
        return $this->id;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getContenu(){
        return $this->contenu;
    }
    public function getDate(){
        return $this->date;
    }

    public function setTitre($titre){
        $this->titre=$titre;
    }
    public function setContenu($contenu){
        $this->contenu=$contenu;
    }
    public function setDate($date){
        $this->date=$date;
    }


}
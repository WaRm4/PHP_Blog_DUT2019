<?php


class Commentaire
{
    private $pseudo;
    private $date;
    private $contenu;
    private $idNews;

    public function __construct($idN,$pseudo, $date, $contenu)
    {
        $this->idNews = $idN;
        $this->pseudo = $pseudo;
        $this->date = $date;
        $this->contenu = $contenu;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
    public function getIdN()
    {
        return $this->idNews;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
}
<?php


class Administrateur
{

    private $id;
    private $nom;
    private $mdp;

    public function __construct($id, $nom, $mdp)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->mdp = mdp;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getMdp(){
        return $this->mdp;
    }
}
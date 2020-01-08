<?php


class CommentaireGateway
{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function selectCommentaires($idN)
    {
        $query = "SELECT * FROM commentaire where idNews = :idN";
        $this->con->executeQuery($query, [':idN'=>[$idN,PDO::PARAM_INT]]);
        $results=$this->con->getResults();
        return $results;
    }

    public function ajoutCommentaire($pseudo, $contenu, $idN)
    {
        $query = "INSERT into commentaire(idNews,pseudo,contenu,dateP) Values (:idN, :pseudo, :contenu, SYSDATE())";
        $this->con->executeQuery($query, [':idN'=>[$idN,PDO::PARAM_INT],
                                         ':pseudo'=>[$pseudo,PDO::PARAM_STR],
                                         ':contenu'=>[$contenu,PDO::PARAM_STR]]);
        return $this->con->getResults();
    }
}
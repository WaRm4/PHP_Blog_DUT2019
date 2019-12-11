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
}
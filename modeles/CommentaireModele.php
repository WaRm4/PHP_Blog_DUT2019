<?php

require_once('Commentaire.php');

class CommentaireModele
{
    private $con;
    private $CommGtw;

    public function __construct($con)
    {
        $this->con = $con;
        $this->CommGtw = new CommentaireGateway($con);
    }

    public function selectCommentaires($idN)
    {
        $results = $this->CommGtw->selectCommentaires($idN);
        $tab = [];
        foreach ($results as $row)
            $tab[] = new Commentaire($row['idNews'], $row['pseudo'], $row['dateP'], $row['contenu']);
        return $tab;
    }

    public function ajouterCommentaire($pseudo, $contenu, $idN)
    {
        return $this->CommGtw->ajoutCommentaire($pseudo, $contenu, $idN);
    }

    public function selectCommEcris()
    {
        $results = $this->CommGtw->selectCommEcris();
        return $results[0]['total'];
    }

}
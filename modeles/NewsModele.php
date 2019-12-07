<?php

require ("News.php");

class NewsModele
{

    private $con;
    private $newsGtw;

    public function __construct($con)
    {
        $this->con=$con;
        $this->newsGtw = new NewsGateway($con);
    }

    public function selectNews()
    {
        $results = $this->newsGtw->selectNews();
        $tab = [];
        foreach ($results as $row)
            $tab[] = new News($row['id'], $row['titre'], $row['contenu'], $row['dateParution'] );
        return $tab;
    }

}
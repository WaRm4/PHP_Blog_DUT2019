<?php

class NewsGateway
{
    private $con;
    public function __construct($con)
    {
        $this->con=$con;
    }

    public function selectNews()
    {
        $query = "SELECT * FROM News";
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        return $results;
    }

    public function selectUneNews($id)
    {
        $query = "SELECT * FROM News where id = :id " ;
        $this->con->executeQuery($query, [':id'=>[$id,PDO::PARAM_INT]]);
        $results=$this->con->getResults();
        return $results;
    }

    public function ajoutNews($titre,$contenu,$url)
    {
        $query = "INSERT into news(titre,contenu,dateParution,url) Values (:titre, :contenu, SYSDATE(), :url)";
        $this->con->executeQuery($query,
            [':titre'=>[$titre,PDO::PARAM_STR],
            ':contenu'=>[$contenu,PDO::PARAM_STR],
            ':url' => [$url,PDO::PARAM_STR] ]);
        return $this->con->getResults();
    }

    public function supprimerNews($id){
        $query = "DELETE from news where id= :id";
        $this->con->executeQuery($query, [':id'=>[$id,PDO::PARAM_INT]] );
        return $this->con->getResults();
    }

    public function rechercher($date)
    {
        $query = "SELECT * FROM News where dateParution = :date " ;
        $this->con->executeQuery($query, [':date'=>[$date,PDO::PARAM_STR]]);
        $results=$this->con->getResults();
        return $results;
    }
}
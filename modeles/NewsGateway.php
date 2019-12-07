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
}
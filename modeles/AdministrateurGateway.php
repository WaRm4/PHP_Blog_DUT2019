<?php


class AdministrateurGateway
{
    private $con;

     public function __construct($con)
     {
         $this->con = $con;
     }

    public function chercherAdmin ($nom){
        $query = "SELECT * from admin where nom= :nom";
        $this->con->executeQuery($query, [':nom'=>[$nom,PDO::PARAM_STR]] );
        return $this->con->getResults();
    }

}
<?php

require_once('Administrateur.php');

class AdministrateurModele
{
    private $con;
    private $AdminGtw;

    public function __construct($con)
    {
        $this->con = $con;
        $this->AdminGtw = new AdministrateurGateway($con);
    }

    public function chercherAdmin($nom, $mdp)
    {
        $log = $this->AdminGtw->chercherAdmin($nom);
        if($log != null) {
            if (password_verify($mdp, $log[0]['mdp']))
                return true;
            else
                return false;
        }
        return false;
    }


}
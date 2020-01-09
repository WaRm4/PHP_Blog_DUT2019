<?php

require("ControllerAdmin.php");
require("ControllerUtilisateur.php");

class FrontController
{
    private $String_actor = "";
    private $listeActions = array(
        'Utilisateur' => array('ValidationComm', 'News', 'Connexion', 'ValidationConnexion', 'Apropos', 'Rechercher' ),
        'Administrateur' => array('ValidationNews', 'AjoutNews', 'Deconnexion', 'SupprimerNews') );
    private $con ;

    public function __construct($con)
    {
        $dataVueErreur = array();
        $this->con = $con;
        session_start();
        try {
            if (empty($_GET['action'])) {
                $action = null;
            } else {
                $action = $_GET['action'];
            }
            $this->String_actor = $this->isAdmin($action);
            if ($this->String_actor != '') {
                if ($this->String_actor == 'Administrateur') {
                    if(! empty($_SESSION) )
                        new ControllerAdmin($con, $action);
                    else{
                        require(__DIR__ . '/../vues/VueConnexion.php');
                        return;
                    }
                }
                if ($this->String_actor == 'Utilisateur') {
                    new ControllerUtilisateur($con, $action);
                }
            } else {
                new ControllerUtilisateur($con, $action);
            }
        } catch (PDOException $pdoErreur) {
            $dataVueErreur[] = "Erreur de PDO";
            require_once(__DIR__ . '/../vues/erreur.php');
        } catch (Exception $erreur) {
            $dataVueErreur[] = "Erreur inattendue";
            require_once(__DIR__ . '/../vues/erreur.php');
        }
    }

    private function isAdmin($action)
    {
        if (in_array($action, $this->listeActions['Utilisateur'])) {
            return 'Utilisateur';
        }
        if (in_array($action, $this->listeActions['Administrateur'])) {
            return 'Administrateur';
        }
        return "";
    }
}
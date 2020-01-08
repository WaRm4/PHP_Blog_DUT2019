<?php


class FrontController
{
    private $String_actor= "";
    private $dataVueErreur = array();
    private $listeActions = array (
        'Utilisateur' => array('ValidationComm', 'News', 'Connexion', 'ValidationConnexion', 'Apropos'),
        'Administrateur' => array('ValidationNews', 'AjoutNews')
    );
    public function __construct()
    {
        try {
            if (empty($_request['action'])) {
                $action = null;
            } else {
                $action = $_request['action'];
            }
            echo "action:" . $action;
            $String_actor = $this->isAdmin($action);
            echo $String_actor;

            if ($String_actor != '') {
                if ($String_actor == 'Administrateur') {
                    new ControllerAdmin();
                }
                if ($String_actor == 'Utilisateur') {
                    new ControllerUtilisateur();
                }
            }
            else{
                new ControllerUtilisateur();
            }
        }
        catch (PDOException $pdoErreur) {
            $this->dataVueErreur[] = "Erreur de PDO";
            require_once(__DIR__ . '/../vues/erreur.php');
        }
        catch (Exception $erreur) {
            $this->dataVueErreur[] = "Erreur inattendue";
            require_once(__DIR__ . '/../vues/erreur.php');
        }
    }
}
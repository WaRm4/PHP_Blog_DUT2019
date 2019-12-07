<?php

require("modeles/Connexion.php");
require("modeles/NewsModele.php");
require("modeles/NewsGateway.php");

class ControllerUtilisateur
{

    function __construct()
    {
        $dataVueErreur = array();

        $user = 'root';
        $pass = '';
        $dsn = 'mysql:host=localhost;dbname=proj';

        try {
            $con = new Connection($dsn, $user, $pass);

            $modelnews = new NewsModele($con);

            if (isset($_GET['action'])) {
                $action = $_REQUEST['action'];

                switch ($action) {

                    case "bjr" :
                        require(__DIR__ . '/../vues/test.php');
                        break;

                    default:
                        $dataVueErreur[] = "Erreur d'appel php";
                        $tab = $modelnews->selectNews();
                        require(__DIR__ . '/../vues/VueUtilisateur.php');
                        break;
                }

            } else {
                $dataVueErreur[] = "Erreur d'appel php";
                $tab = $modelnews->selectNews();
                require(__DIR__ . '/../vues/VueUtilisateur.php');
            }
        } catch
        (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dataVueErreur[] = "Erreur inattendue BDD!!! ";
            require(__DIR__ . '/../vues/erreur.php');

        } catch (Exception $e2) {
            $dataVueErreur[] = "Erreur inattendue!!! ";
            require(__DIR__ . '/../vues/erreur.php');
        }


        exit(0);
    }

}
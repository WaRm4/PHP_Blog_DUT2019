<?php

require("modeles/Connexion.php");
require("modeles/NewsModele.php");
require("modeles/NewsGateway.php");
require("modeles/CommentaireModele.php");
require("modeles/CommentaireGateway.php");
require ("Config/Validation.php");

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
            $modelCommentaire = new CommentaireModele($con);

            if (isset($_GET['action'])) {
                $action = $_REQUEST['action'];

                switch ($action) {

                    case "bjr" :
                        require(__DIR__ . '/../vues/test.php');
                        break;

                    case "News" :
                        $news = $modelnews->selectUneNews($_GET['id']);
                        $commentaire = $modelCommentaire->selectCommentaires($_GET['id']);
                        require(__DIR__ . '/../vues/VueNews.php');
                        break;

                    case "Validation" :
                        $this->validationCommentaire($dataVueErreur, $modelCommentaire);
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

    function validationCommentaire(array $dVueEreur, $modelCommentaire) {

        $pseudo=$_POST['pseudo'];
        $contenu=$_POST['contenu'];
        Validation::val_Commentaire($pseudo,$contenu,$dVueEreur);

        $commentaire = $modelCommentaire->selectCommentaires($_GET['id']);

        require(__DIR__ . '/../vues/VueNews.php');
    }

}
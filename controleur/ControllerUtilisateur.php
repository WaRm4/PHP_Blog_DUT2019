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

                    case "News" :
                        $news = $modelnews->selectUneNews($_GET['id']);
                        $commentaire = $modelCommentaire->selectCommentaires($_GET['id']);
                        require(__DIR__ . '/../vues/VueNews.php');
                        break;

                    case "ValidationComm" :
                        $id = $_GET['id'];
                        $pseudo=$_POST['pseudo'];
                        $contenu=$_POST['contenu'];
                        if(Validation::val_Commentaire($pseudo,$contenu,$dataVueErreur)) {
                            $commentaire = $modelCommentaire->ajouterCommentaire($pseudo, $contenu, $id);
                        }
                        else
                        {
                            $dataVueErreur[] = "Probleme lors de la validation";
                            require(__DIR__ . '/../vues/erreur.php');
                        }
                        HEADER('location : index.php?action=News&id=' . $id );
                        break;

                    case "ValidationNews" :
                        $dataVueErreur[] = "News validée ";
                        require(__DIR__ . '/../vues/erreur.php');
                        break;

                    case "AjoutNews" :
                        require(__DIR__ . '/../vues/VueAjoutNews.php');
                        break;

                    case "Connexion" :
                        require(__DIR__ . '/../vues/VueConnexion.php');
                        break;

                    case "ValidationConnexion" :
                        $dataVueErreur[] = "Connexion validée ";
                        require(__DIR__ . '/../vues/erreur.php');
                        break;

                    case "Apropos" :
                        require(__DIR__ . '/../vues/Apropos.php');
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
            //si erreur BD
            $dataVueErreur[] = "Erreur inattendue BDD!!! ";
            require(__DIR__ . '/../vues/erreur.php');

        } catch (Exception $e2) {
            $dataVueErreur[] = "Erreur inattendue!!! ";
            require(__DIR__ . '/../vues/erreur.php');
        }


        exit(0);
    }


}
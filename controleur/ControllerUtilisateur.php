<?php

require("modeles/NewsModele.php");
require("modeles/NewsGateway.php");
require("modeles/CommentaireModele.php");
require("modeles/CommentaireGateway.php");
require("Config/Validation.php");
require("modeles/AdministrateurModele.php");

class ControllerUtilisateur
{
    private $con;

    function __construct($con, $action)
    {
        $dataVueErreur = array();
        try {
            $this->con = $con;
            $modelnews = new NewsModele($con);
            $modelCommentaire = new CommentaireModele($con);
            $modelAdmin = new AdministrateurModele($con);

            $nbComm = $modelCommentaire->selectCommEcris();

            switch ($action) {

                case "News" :
                    $news = $modelnews->selectUneNews($_GET['id']);
                    $commentaire = $modelCommentaire->selectCommentaires($_GET['id']);
                    if(!empty($_SESSION) && !empty($_SESSION['pseudo']) )
                        $psd = $_SESSION['pseudo'];
                    else
                        $psd = "";
                    require(__DIR__ . '/../vues/VueNews.php');
                    break;

                case "ValidationComm" :
                    $id = $_GET['id'];
                    $pseudo = $_POST['pseudo'];
                    $contenu = $_POST['contenu'];

                    if(!empty($_SESSION)) {
                        setcookie('nbCommU', $_COOKIE['nbCommU'] + 1, time() + 3600);
                        $_SESSION['pseudo'] = $pseudo;
                    }
                    if (Validation::val_Commentaire($pseudo, $contenu, $dataVueErreur)) {
                        $dataVueErreur[] = $modelCommentaire->ajouterCommentaire($pseudo, $contenu, $id);
                    } else {
                        $dataVueErreur[] = "Probleme lors de la validation";
                        require(__DIR__ . '/../vues/erreur.php');
                        break;
                    }
                    HEADER('location : index.php?action=News&id=' . $id);
                    break;


                case "Connexion" :
                    require(__DIR__ . '/../vues/VueConnexion.php');
                    break;

                case "ValidationConnexion" :
                    $nom = $_POST['nom'];
                    $mdp = $_POST['mdp'];
                    if (Validation::val_Connexion($nom, $mdp, $dataVueErreur)) {
                        $mdpe = $modelAdmin->chercherAdmin($nom, $mdp);
                        if ($mdpe) {
                            $_SESSION['role'] = 'Administrateur';
                            $_SESSION['login'] = $nom;
                        } else {
                            $dataVueErreur[] = "L'utilisateur n'existe pas dans la base";
                            require(__DIR__ . '/../vues/erreur.php');
                            break;
                        }
                    } else {
                        $dataVueErreur[] = "Probleme lors de la validation";
                        require(__DIR__ . '/../vues/erreur.php');
                        break;
                    }
                    setcookie('nbCommU', 0, time() + 3600);
                    $tab = $modelnews->selectNews();
                    require(__DIR__ . '/../vues/VueUtilisateur.php');
                    break;

                case "Apropos" :
                    require(__DIR__ . '/../vues/Apropos.php');
                    break;

                case 'Rechercher' :
                    $date = $_POST['date'];
                    $tab = $modelnews->rechercher($date);
                    require(__DIR__ . '/../vues/VueUtilisateur.php');
                    break;

                default:
                    $dataVueErreur[] = "Erreur d'appel php";
                    $tab = $modelnews->selectNews();
                    require(__DIR__ . '/../vues/VueUtilisateur.php');
                    break;
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
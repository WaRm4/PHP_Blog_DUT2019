<?php

require('modeles/AdministrateurGateway.php');

class ControllerAdmin
{
    private $con;

    public function __construct($con, $action)
    {
        $dataVueErreur = array();
        try {
            $modelnews = new NewsModele($con);
            $modelCommentaire = new CommentaireModele($con);

            $nbComm = $modelCommentaire->selectCommEcris();

            $this->con = $con;
            switch ($action) {

                case "Deconnexion" :
                    session_unset();
                    session_destroy();
                    setcookie('nbCommU', 0, time() - 3600);
                    require(__DIR__ . '/../vues/VueConnexion.php');
                    break;

                case "ValidationNews" :
                    $titre = $_POST['titre'];
                    $contenu = $_POST['contenu'];
                    $url = $_POST['url'];
                    if (Validation::val_News($titre, $contenu, $url, $dataVueErreur)) {
                        $news = $modelnews->ajoutNews($titre, $contenu, $url);
                    } else {
                        $dataVueErreur[] = "Probleme lors de la validation";
                        require(__DIR__ . '/../vues/erreur.php');
                        break;
                    }
                    $tab = $modelnews->selectNews();
                    require(__DIR__ . '/../vues/VueUtilisateur.php');
                    break;

                case "AjoutNews" :
                    require(__DIR__ . '/../vues/VueAjoutNews.php');
                    break;

                case "SupprimerNews" :
                    $id = $_GET['id'];
                    $result = $modelnews->supprimerNews($id);
                    require(__DIR__ . '/../vues/VueUtilisateur.php');
                    break;
            }

        } catch (PDOException $e) {
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
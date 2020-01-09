<?php

class Validation
{

    static function val_action($action)
    {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }

        //on pourrait aussi utiliser
        //$action = $_GET['action'] ?? 'no';
        // This is equivalent to:
        //$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';

    }

    static function val_Commentaire(string &$pseudo, string &$contenu, array &$dataVueErreur)
    {

        if (!isset($pseudo) || $pseudo == "") {
            $dataVueErreur[] = "pas de pseudo";
            $pseudo = "";
            return false;
        }

        if ($pseudo != filter_var($pseudo, FILTER_SANITIZE_STRING)) {
            $dataVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $pseudo = "";
            return false;
        }

        if (!isset($contenu) || $contenu == "") {
            $dataVueErreur[] = "pas de contenu";
            $contenu = "";
            return false;
        }

        if ($contenu != filter_var($contenu, FILTER_SANITIZE_STRING)) {
            $dataVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $contenu = "";
            return false;
        }
        return true;
    }

    static function val_News(string &$titre, string &$contenu, string &$url, array &$dataVueErreur)
    {

        if (!isset($titre) || $titre == "") {
            $dataVueErreur[] = "pas de titre";
            $titre = "";
            return false;
        }

        if ($titre != filter_var($titre, FILTER_SANITIZE_STRING)) {
            $dataVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $titre = "";
            return false;
        }

        if (!isset($contenu) || $contenu == "") {
            $dataVueErreur[] = "pas de contenu";
            $contenu = "";
            return false;
        }

        if ($contenu != filter_var($contenu, FILTER_SANITIZE_STRING)) {
            $dataVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $contenu = "";
            return false;
        }

        //L'URL peut etre vide
        if (!isset($url) || $url == "") {
            if ($url != filter_var($url, FILTER_SANITIZE_STRING)) {
                $dataVueErreur[] = "tentative d'injection de code (attaque sécurité)";
                $url = "";
                return false;
            }
            if ($url != filter_var($url, FILTER_SANITIZE_URL)) {
                $dataVueErreur[] = "tentative d'injection de code (attaque sécurité)";
                $url = "";
                return false;
            }
        }

        return true;

    }

    static function val_Connexion(string &$nom, string &$mdp, array &$dataVueErreur)
    {
        if (!isset($nom) || $nom == "") {
            $dataVueErreur[] = "pas de nom d'utilisateur";
            $nom = "";
            return false;
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING)) {
            $dataVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $nom = "";
            return false;
        }

        if (!isset($mdp) || $mdp == "") {
            $dataVueErreur[] = "pas de mot de passe";
            $mdp = "";
            return false;
        }

        if ($mdp != filter_var($mdp, FILTER_SANITIZE_STRING)) {
            $dataVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $mdp = "";
            return false;
        }

        return true;
    }

}


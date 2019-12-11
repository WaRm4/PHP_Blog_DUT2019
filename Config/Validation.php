<?php

class Validation {

    static function val_action($action) {

        if (!isset($action)) { throw new Exception('pas d\'action');}

        //on pourrait aussi utiliser
//$action = $_GET['action'] ?? 'no';
        // This is equivalent to:
        //$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';

    }

    static function val_Commentaire(string &$pseudo, string &$contenu, array &$dataVueErreur) {

        if (!isset($pseudo)||$pseudo=="") {
            $dataVueErreur[] =	"pas de pseudo";
            $pseudo="";
        }

        if ($pseudo != filter_var($pseudo, FILTER_SANITIZE_STRING))
        {
            $dataVueErreur[] =	"tentative d'injection de code (attaque sécurité)";
            $pseudo="";
        }

        if (!isset($contenu)||$contenu=="") {
            $dataVueErreur[] =	"pas de contenu";
            $contenu="";
        }

        if ($contenu != filter_var($contenu, FILTER_SANITIZE_STRING))
        {
            $dataVueErreur[] =	"tentative d'injection de code (attaque sécurité)";
            $contenu="";
        }

    }

}
?>

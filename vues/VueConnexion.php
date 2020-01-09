<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Connexion</title>
    <link href="vues/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Car c'est appelé depuis l'index-->
    <link href="vues/css/vueNews.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="vues/images/connexion.png" />

</head>

<?php
include("header.php");
?>

<body>
<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <form id="formConnexion" method="post" action="index.php?action=ValidationConnexion">
                <div class="form-group">
                    <h2><span class="label label-default">Nom d'utilisateur</span></h2>
                    <input type="text" class="form-control" name="nom" placeholder="Ex : kimeunier" required>
                    <small class="form-text text-light">Votre nom d'utilisateur reste
                        confidentiel.</small>
                </div>
                <div class="form-group">
                    <h2><span class="label label-default">Mot de Passe</span></h2>
                    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
                </div>
                <button type="submit" form="formConnexion" class="btn btn-primary">Valider</button>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>

<div style="position: absolute; width: 100%; bottom: 0">
<?php

include("footer.php");

?>
</div>

</body>

</html>
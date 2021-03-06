<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>News</title>
    <link href="vues/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Car c'est appelé depuis l'index-->
    <link href="vues/css/vueNews.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="vues/images/ajouter.png" />

</head>

<?php
include("header.php");
?>

<body>
<div class="container">
        <div class="col-md">
            <form method="post" action='index.php?action=ValidationNews' id="ajoutNews">
                <div class="form-group">
                    <h2><span class="label label-default">Titre</span></h2>
                    <input type="text" class="form-control" name="titre" required
                           placeholder="Une super News...">
                </div>
                <div class="form-group">
                    <h2><span class="label label-default">Contenu</span></h2>
                    <textarea class="form-control" name="contenu" required rows="11" placeholder="Mon contenu..."></textarea>
                </div>
                <div class="form-group">
                    <h2><span class="label label-default">URL d'image</span></h2>
                    <textarea class="form-control" name="url" rows="1" placeholder="https://google/image..."></textarea>
                </div>
                <button style="margin-bottom: 15px" type='submit' form='ajoutNews' name='valider' class='btn btn-primary' >Valider</button>
            </form>
        </div>

</div>

<?php

include("footer.php");

?>

</body>

</html>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">

    <title>Super Blog</title>

    <link href="vues/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Car c'est appelé depuis l'index-->
    <link href="vues/css/vueUtilisateur.css" rel="stylesheet" >
    <link rel="icon" type="image/x-icon" href="vues/images/home.png" />

</head>

<?php
include("header.php");

?>

<body>
<div class="container">

    <div class="row">

        <div class="col-md-9">

            <h1 class="my-4">Bienvenue sur mon super Blog !
            </h1>
            <h1>
                <small>Ce blog est génial ! </small>
            </h1>
            <br>


            <?php
            Foreach ($tab as $row) {

                echo "
            <div class='card mb-4 '>
                <img class='card-img-top' src= " . $row->getUrl() . " width='100%' height='100%'>
                <div class='card-body'>
                    <h2 class='card-title'> " . $row->getTitre() . " </h2>
                    <p class='card-text'> " . $row->getContenu() . "</p>
                    <div class='row'>
                        <a href='index.php?action=News&id=" . $row->getId() . "' class='btn btn-primary'>Voir plus &rarr;</a>
                        ";
                if (empty($_SESSION))
                    echo "
                            <a class='btn btn-danger ml-auto disabled'>Supprimer la news</a>
                            ";
                else
                    echo "
                        <a class='btn btn-danger ml-auto' href='index.php?action=SupprimerNews&id=" . $row->getId() . "'>Supprimer la news</a>
                        ";

                echo "
                    </div>
                </div>
                <div class='card-footer text-muted'>
                    Posté le :  " . $row->getDate() . "
                </div>
                    </div>
             
                        ";

            }

            ?>

            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Précédent</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Suivant &rarr;</a>
                </li>
            </ul>

        </div>

        <div class="col-md-3    ">

            <div class="card my-5">
                <h5 class="card-header">Rechercher</h5>
                <div class="card-body">
                    <div class="input-group">
                        <form id='rechercher' method='post' action='index.php?action=Rechercher'>
                            <input type="text" required name="date" class="form-control" placeholder="Ex : AAAA-MM-JJ">
                            <span class="input-group-btn">
                            <button class="btn btn-secondary" form="rechercher" type="submit">Go!</button>
                        </form>
              </span>
                    </div>
                </div>
            </div>

            <div class="card my-5">
                <h5 class="card-header">Pub</h5>
                <div class="card-body" >
                    <img src="https://publiticket.fr/wp-content/uploads/2017/10/publicite%CC%81.jpg" width="100%" >
                </div>
            </div>

        </div>

    </div>

</div>

<?php

include("footer.php");

?>

</body>

</html>

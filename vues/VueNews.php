<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>News</title>
    <link href="vues/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Car c'est appelé depuis l'index-->
    <link href="vues/css/vueNews.css" rel="stylesheet">

</head>

<?php
include("header.php");
?>

<body>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Post Content Column -->
        <div class="col-md">
            <?php
            echo "
            <h1 class='mt-4 text-center'>" . $news->getTitre() . "</h1>
            <hr>
            <p>Posté le :  " . $news->getDate() . "</p>
            <hr>
            <!-- Preview Image -->
            <img class='img-fluid rounded' src=" . $news->getUrl() . " width='100%' height='100%'>
            <hr>
                <div class='row ' style='word-break: break-word '>
                    <p class='text-justify' style='margin-left: 2%'>" . $news->getContenu() . "</p>
                </div>
            <hr>
            "
            ?>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Commentaires :</h5>
                <div class="card-body">
                    <?php
                    echo "
                        <form id='sendComm' method='post' action='index.php?action=Validation&id=".$news->getId()."'>
                        " ?>
                        <textarea name="pseudo" required class="form-control" placeholder="pseudo" rows="1"></textarea>
                        <div class="form-group">
                            <textarea name="contenu" required class="form-control" placeholder="commentaire"
                                      rows="3"></textarea>
                        </div>
                        <button type='submit' form='sendComm' name='valider' class='btn btn-primary' >Valider</button>
                    </form>
                </div>
            </div>

            <?php
            foreach ($commentaire as $row)
                echo "
                    <div class='media mb-4 bg-light rounded' >
                        <img class='d-flex mr-3 rounded-circle' src='http://placehold.it/50x50'>
                        <div class='media-body' style='width: 90% ; word-break: break-word'>
                            <h5 class='mt-0'>" . $row->getPseudo() . "</h5>
                            " . $row->getContenu() . "
                        </div>
                    </div>
                    "
            ?>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php

include("footer.php");

?>

</body>

</html>


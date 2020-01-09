<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>News</title>
    <link href="vues/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Car c'est appelé depuis l'index-->
    <link href="vues/css/vueNews.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="vues/images/icone.png"/>

</head>

<?php
include("header.php");
?>

<body>

<div class="container">
    <div class="row">
        <div class="col-md">
            <?php
            echo "
            <h1 class='mt-4 text-center'>" . $news->getTitre() . "</h1>
            <hr>
            <div class='row'>
                <p class='col-4'>Posté le :  " . $news->getDate() . "</p> ";
                if (empty($_SESSION))
                    echo "
                        <a class='btn btn-danger ml-auto disabled'>Supprimer la news</a>
                        ";
                else
                    echo "
                        <a class='btn btn-danger ml-auto' href='index.php?action=SupprimerNews&id=" . $news->getId() . "'>Supprimer la news</a>
                        ";
                echo "
            </div>
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

            <div class="card my-4">
                <h5 class="card-header">Commentaires :</h5>
                <div class="card-body">
                    <?php
                    echo "
                        <form id='sendComm' method='post' action='index.php?action=ValidationComm&id=" . $news->getId() . "'>
                        
                    <textarea name='pseudo' required class='form-control' placeholder='pseudo' rows='1'>".$psd."</textarea>
                    "?>
                    <div class="form-group">
                            <textarea name="contenu" required class="form-control" placeholder="commentaire"
                                      rows="3"></textarea>
                    </div>
                    <button type='submit' form='sendComm' name='valider' class='btn btn-primary'>Valider</button>
                    </form>
                </div>
            </div>

            <?php
            foreach ($commentaire as $row)
                echo "
                    <div class='media mb-4 bg-light rounded' >
                        <img class='d-flex mr-3 rounded-circle' src='https://icon-icons.com/icons2/510/PNG/48/person_icon-icons.com_50075.png'>
                        <div class='container'>
                            <div class='media-body row' style='width: 98% ; word-break: break-word'>
                                <h5 class='mt-0'>" . $row->getPseudo() . "</h5>
                                <p class='ml-auto'>Posté le : ". $row->getDate() ."</p>
                            </div>
                            <div class='row'>" . $row->getContenu() . "</div>
                        </div>
                    </div>
                    "
            ?>

        </div>
    </div>

</div>
<?php

include("footer.php");

?>

</body>

</html>


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

<div class="container">
    <div class="row">
        <div class="col-md">

            <div class="card text-center">
                <div class="card-header">
                    A propos de nous
                </div>

                <div class="card-body">
                    <h5 class="card-title">Super blog, le meileur blog</h5>
                    <p class="card-text">Super Blog à été créer par deux bons potes, Romain Le Moan et Killian Meunier
                        dans le cadre de leur cursus scolaire. En deuxième année de DUT informatique au campus des
                        Cézeaux à Aubière, ils ont pu créer ce blog en PHP principalement. Ce blog respecte
                        l'architecture MVC. Si vous avez besoin de plus d'informations, n'hésitez pas à nous contacter
                        avec le lien ci-dessous ! :)</p>
                    <a href="https://www.facebook.com/killian.meunier.9" class="btn btn-primary">Nous contacter</a>
                    <img class="img-fluid rounded" style="margin-top: 15px"
                         src="https://www.portail-des-vacances.com/wp-content/uploads/2018/10/nature-2576652_960_720.jpg">
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


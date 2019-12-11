<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">

    <title>Super Blog</title>

    <link href="vues/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Car c'est appelé depuis l'index-->
    <link href="vues/css/vueUtilisateur.css" rel="stylesheet" >

</head>

<?php
include("header.php");

?>

<body>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-9">

            <h1 class="my-4">Bienvenue sur mon super Blog !
            </h1>
            <h1>
                <small>Ce blog est génial ! </small>
            </h1>
            <br>


            <?php
            Foreach ($tab as $row)


                echo "
            <div class='card mb-4 '>
                <img class='card-img-top' src= " . $row->getUrl() . " width='100%' height='100%'>
                <div class='card-body'>
                    <h2 class='card-title'> " . $row->getTitre() . " </h2>
                    <p class='card-text'> " . $row->getContenu() . "</p>
                    <a href='?action=News&id=" . $row->getId() . "' class='btn btn-primary'>Read More &rarr;</a>
                </div>
                <div class='card-footer text-muted'>
                    Posted on " . $row->getDate() . "
                </div>
                    </div>
             
                        "

            ?>

            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3    ">

            <!-- Search Widget -->
            <div class="card my-5">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Side Widget -->
            <div class="card my-5">
                <h5 class="card-header">Pub</h5>
                <div class="card-body" >
                    <img src="https://publiticket.fr/wp-content/uploads/2017/10/publicite%CC%81.jpg" width="100%" >
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<?php

include("footer.php");

?>

<!-- Bootstrap core JavaScript
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
-->
</body>

</html>

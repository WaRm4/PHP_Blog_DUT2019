<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  fixed-top ">
        <div class="container">
            <a class="navbar-brand " href="index.php">Super Blog</a>
            <?php
            echo "
                <a class='text-white-50'>| Nombre de commentaires du site : ". $nbComm ." </a>
                ";
            if(!empty($_SESSION))
                if(empty($_COOKIE['nbCommU']))
                    echo "<a class='text-white-50'> | Mes commentaires : 0 </a>";
                else
                    echo " <a class='text-white-50'> | Mes commentaires : ". $_COOKIE['nbCommU'] ." </a> ";
            ?>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php
                    if ( empty($_SESSION) ) {
                        echo " 
                        <li class='nav-item' >
                        <a class='nav-link' href = 'index.php?action=Connexion' >Connexion</a >
                    </li >
                        ";
                    }
                    else
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='index.php?action=AjoutNews'>Ajouter News</a>
                        </li>
                        <li class='nav-item' >
                        <a class='nav-link' href = 'index.php?action=Deconnexion' > Deconnexion</a >
                    </li > ";
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=Apropos">A propos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>
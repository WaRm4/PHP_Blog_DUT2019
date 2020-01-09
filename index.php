<?php
require_once("modeles/Connexion.php");

$user = 'root';
$pass = '';
$dsn = 'mysql:host=localhost;dbname=proj';
$con = new Connection($dsn, $user, $pass);

require ("controleur/FrontController.php");

$cont = new FrontController($con);

?> 
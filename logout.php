<?php session_start();
session_destroy();
echo "Vous êtes déconnecté";
echo "<br> <a href='login.php'>Se connecter</a>";


 if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
     session_destroy();
     header('Location: ./login.php');
     exit();
 } else {
     header('Location: ./login.php');
     exit();
 }

<?php session_start();

// Exercice 3
session_destroy();
echo "Vous êtes déconnecté";
echo "<br> <a href='login.php'>Se connecter</a>";

// Exercice 8 
session_destroy();
header("location: ./login.php");

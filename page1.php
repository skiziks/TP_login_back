<?php session_start();
$_SESSION['nom'] = 'Doe';
$_SESSION['prenom'] = 'John';
$_SESSION['email'] = 'john.doe@gmail.com';
$_SESSION['heure'] = time();
header('location: page2.php');

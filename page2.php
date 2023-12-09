<?php session_start();
if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['email']) && isset($_SESSION['heure'])) {
    $date = date('d/m/Y H:i:s', $_SESSION['heure']);
    echo "Nom : " . $_SESSION['nom'] . "<br> Prénom : " . $_SESSION['prenom'] 
        . "<br> Email : " . $_SESSION['email'] . "<br> Heure : " . $date;
}

echo "<br><a href='./logout.php'>Déconnexion</a>";

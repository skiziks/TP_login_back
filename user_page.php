<?php session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
} else {
    echo "$_SESSION[login_user] est connecté en tant qu'utilisateur";
    echo "<br> <a href='logout.php'>Logout</a>";
}

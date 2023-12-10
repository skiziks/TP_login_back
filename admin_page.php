<?php session_start();
if (!isset($_SESSION['id_admin']) && !isset($_SESSION['login_admin'])) {
    header("Location: login.php");
    exit();
} else {
    echo "$_SESSION[login_admin] est connecté en tant qu'admin";
    echo "<br> <a href='logout.php'>Logout</a>";
}

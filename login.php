<?php session_start();
if (isset($_SESSION['id_admin'])) {
    header("Location: admin_page.php");
    exit();
} elseif (isset($_SESSION['id_user'])) {
    header("Location: user_page.php");
    exit();
} else {
    if ($_POST) {
        require_once 'connexion.php';
        extract($_POST);
        if ($type_user == "admin") {
            $sql = "SELECT * FROM `admins` WHERE `login_admin` = '$user_name' AND `pwd_admin` = '$password'";
        } else {
            $sql = "SELECT * FROM `users` WHERE `login_user` = '$user_name' AND `pwd_user` = '$password'";
        }
        $resultat = mysqli_query($bdd, $sql);
        if ($resultat) {
            if (mysqli_num_rows($resultat) == 0) {
                echo 'Utilisateur ou mot de passe incorrecte !!';
            } else if ($type_user == "admin") {
                $row = mysqli_fetch_assoc($resultat);
                $_SESSION['id_admin'] = $row['id_admin'];
                $_SESSION['login_admin'] = $row['login_admin'];
                header("location: admin_page.php");
            } else {
                $row = mysqli_fetch_assoc($resultat);
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['login_user'] = $row['login_user'];
                header("location: user_page.php");
            }
        }
        mysqli_free_result($resultat);
        mysqli_close($bdd);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="login.php" id="form" method="POST">
        <h1>Login</h1>
        <label for="user_name">Nom d'utilisateur:</label>
        <input type="text" name="user_name" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required><br>

        <label for="type_user">Type d'utilisateur:</label>
        <select name="type_user" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br>

        <input type="submit" value="Se connecter">
    </form>
</body>

</html>
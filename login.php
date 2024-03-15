// READ USER

<?php
session_start(); // Démarrage de la session
require_once 'config.php'; // On inclut la connexion à la base de données

if (!empty($_POST['user']) && !empty($_POST['password'])) // Si il existe les champs user, password et qu'il sont pas vident
{
    // Patch XSS
    $user = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['password']);

    $user = strtolower($user); // pseudo transformé en minuscule

    // On regarde si l'utilisateur est inscrit dans la table utilisateurs
    $check = $bdd->prepare('SELECT user, password, token FROM users WHERE user = ?');
    $check->execute(array($user));
    $data = $check->fetch();
    $row = $check->rowCount();

    // Si > à 0 alors l'utilisateur existe
    if ($row > 0) {
        // Si le mot de passe est le bon
        if (password_verify($password, $data['password'])) {
            // On créer la session et on redirige sur landing.php
            $_SESSION['user'] = $data['token'];
            header('Location:assets/page/dashboard.php');
            die();
        } else {
            header('Location: index.php?login_err=password');

            die();
        }
    } else {
        header('Location: index.php?login_err=password');

        die();
    }
} else {
    header('Location: index.php?login_err=password');

    die();
}
// DELETE USER

<?php
session_start(); // Démarrage de la session
require_once 'config.php'; // On inclut la connexion à la base de données.

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
} else {



    // Patch XSS
    $user = htmlspecialchars($_POST['user']);

    $user = strtolower($user); // pseudo transformé en minuscule

    // On récupère l'user depuis le token enregistré dans la session

    $check_user = $bdd->prepare('SELECT id FROM users WHERE token = :token');
    $check_user->execute(
        array(
            "token" => $_SESSION['user']
        )
    );
    $data_password = $check_user->fetch();

    if ($data_password) {
        // L'utilisateur a été trouvé dans la base de données
        $user_id = $data_password['id'];

        // Préparez et exécutez une requête DELETE pour supprimer l'utilisateur
        $delete_user = $bdd->prepare('DELETE FROM users WHERE id = :user_id');
        $delete_user->execute(array('user_id' => $user_id));

        // Vérifiez si l'utilisateur a été supprimé avec succès
        if ($delete_user->rowCount() > 0) {

            session_start(); // demarrage de la session
            session_destroy(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
            header('Location:index.php');
            die();


        } else {
            header('Location:assets/page/dashboard.php');

        }
    }





}

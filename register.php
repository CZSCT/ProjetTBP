// CREATE USER



<?php
require_once 'config.php'; // On inclu la connexion à la bdd

// Si les variables existent et qu'elles ne sont pas vides
if (!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
    // Patch XSS
    $user = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // On vérifie si l'utilisateur existe
    $check = $bdd->prepare('SELECT user, password FROM users WHERE user = ?');
    $check->execute(array($user));
    $data = $check->fetch();
    $row = $check->rowCount();

    $user = strtolower($user); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..

    // Si la requete renvoie un 0 alors l'utSilisateur n'existe pas 
    if ($row == 0) {
        if (strlen($user) <= 100) { // On verifie que la longueur du pseudo <= 100
            if ($password === $password_retype) { // si les deux mdp saisis sont bon

                // On hash le mot de passe avec Bcrypt, via un coût de 12
                $cost = ['cost' => 12];
                $password = password_hash($password, PASSWORD_BCRYPT, $cost);



                // On insère dans la base de données
                $insert = $bdd->prepare('INSERT INTO users(user, password, token) VALUES(:user, :password, :token)');
                $insert->execute(
                    array(
                        'user' => $user,
                        'password' => $password,
                        'token' => bin2hex(openssl_random_pseudo_bytes(64))
                    )
                );
                // On redirige avec le message de succès
                header('Location:index.php');
                die();
            } else {
                header('Location: index.php?reg_err=password');
                die();
            }


        } else {
            header('Location: index.php?reg_err=pseudo_length');

            die();
        }
    } else {
        header('Location: index.php?reg_err=already');

        die();
    }
}
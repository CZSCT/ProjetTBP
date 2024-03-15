<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://kit.fontawesome.com/93855b59f0.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <title>The body studio - tarifs</title>
    </head>

    <?php
    if (isset($_GET['login_err']) && !isset($_SESSION['modal_shown'])) {
        $_SESSION['modal_shown'] = true;
        ?>
        <script type="text/javascript">


            $(document).ready(function () {
                $('#loginModal').modal('show');

            });
        </script>
        <?php
    }

    if (isset($_GET['reg_err']) && !isset($_SESSION['modal_shown'])) {
        $_SESSION['modal_shown'] = true;
        ?>


        <script type="text/javascript">

            $(document).ready(function () {
                $('#registerModal').modal('show');
            });


        </script>
        <?php
    }
    ?>

    <body style="background-color: #413C3C;">

        <!-- l'élément a une hauteur égale à celle de son parent -->
        <header class="h-100">
            <nav class="navbar navbar-expand-lg navbar-dark bg-black justify-content-center">
                <div class="container">
                    <a class="nav-link" href="./index.php">
                        <img src="assets/img/thebodystudio.png" class="logo1 float-left"></a>
                    <div class="cart-logo-container"></div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto text-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="./index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./assets/page/bio.php">Bio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./assets/page/service.php">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./assets/page/tarifs.php">Tarifs</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="./assets/page/contact.php">Contact</a> -->
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="./assets/page/dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" style="margin-left:100vmin;">
                                    <i class="fa-solid fa-user fa-lg" style="color: #e7e9ed;" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#loginModal"></i>
                                </div>



                                <div class="modal" id="loginModal" tabindex="-1" role="dialog"
                                    aria-labelledby="loginModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" style="color: black;">Connexion</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body">
                                                <form class="modal-content animate" action="login.php" method="post">

                                                    <?php


                                                    if (isset($_GET['login_err'])) {



                                                        $err = htmlspecialchars($_GET['login_err']);

                                                        switch ($err) {
                                                            case 'password':
                                                                ?>
                                                                <div class="alert alert-danger">
                                                                    <strong>Erreur</strong> mot de passe incorrect
                                                                </div>
                                                                <?php
                                                                break;

                                                            case 'email':
                                                                ?>
                                                                <div class="alert alert-danger">
                                                                    <strong>Erreur</strong> email incorrect
                                                                </div>
                                                                <?php
                                                                break;

                                                            case 'already':
                                                                ?>
                                                                <div class="alert alert-danger">
                                                                    <strong>Erreur</strong> compte non existant
                                                                </div>
                                                                <?php
                                                                break;
                                                        }
                                                    }
                                                    ?>

                                                    <div class="container"
                                                        style="padding-top: 30px; padding-bottom: 10px; display: block;">
                                                        <div style="display: flex;">
                                                            <label for="user"
                                                                style="width: 150px; text-align: left;"><b>Email
                                                                    :</b></label>
                                                            <input type="text" placeholder="Nom d'utilisateur"
                                                                name="user" required style="margin-left: 20px;">
                                                        </div>
                                                        <div
                                                            style="display: flex; margin-top: 20px; margin-bottom: 20px;">
                                                            <label for="password"
                                                                style="width: 150px; text-align: left;"><b>Mot de passe
                                                                    :</b></label>
                                                            <input type="password" placeholder="Mot de passe"
                                                                name="password" required style="margin-left: 20px;">
                                                        </div>
                                                        <div style="display: flex; text-align: center; width: 100%;">
                                                            <button type="submit" style="margin: 0 auto;">Se
                                                                connecter</button>
                                                        </div>
                                                        <div
                                                            style="display: flex; text-align: center; margin: 0 auto; margin-top: 10px;">

                                                            <p data-bs-toggle="modal" type="none"
                                                                data-bs-target="#registerModal"
                                                                style="margin-right: 3px; width: 100%; color: #0070E0; text-decoration: underline; cursor: pointer;">
                                                                Créer
                                                                un compte </p>

                                                            ou

                                                            <span class="psw" style="margin-left: 3px; width: 100%;">
                                                                mot de passe <a href="#">oublié?</a></span>
                                                        </div>


                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="registerModal" class="modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" style="color: black;">Inscription</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body">
                                                <form class="modal-content animate" action="register.php" method="post">

                                                    <div class="container"
                                                        style="padding-top: 30px; padding-bottom: 10px; display: block;">

                                                        <?php
                                                        if (isset($_GET['reg_err'])) {

                                                            $err = htmlspecialchars($_GET['reg_err']);

                                                            switch ($err) {
                                                                case 'success':
                                                                    ?>
                                                                    <div class="alert alert-success">
                                                                        <strong>Succès</strong> inscription réussie !
                                                                    </div>
                                                                    <?php
                                                                    break;

                                                                case 'password':
                                                                    ?>
                                                                    <div class="alert alert-danger">
                                                                        <strong>Erreur</strong> mot de passe différent
                                                                    </div>
                                                                    <?php
                                                                    break;

                                                                case 'email':
                                                                    ?>
                                                                    <div class="alert alert-danger">
                                                                        <strong>Erreur</strong> email non valide
                                                                    </div>
                                                                    <?php
                                                                    break;

                                                                case 'email_length':
                                                                    ?>
                                                                    <div class="alert alert-danger">
                                                                        <strong>Erreur</strong> email trop long
                                                                    </div>
                                                                    <?php
                                                                    break;

                                                                case 'pseudo_length':
                                                                    ?>
                                                                    <div class="alert alert-danger">
                                                                        <strong>Erreur</strong> pseudo trop long
                                                                    </div>
                                                                    <?php
                                                                case 'already':
                                                                    ?>
                                                                    <div class="alert alert-danger">
                                                                        <strong>Erreur</strong> compte deja existant
                                                                    </div>
                                                                <?php

                                                            }
                                                        }
                                                        ?>

                                                        <div style="display: flex;">
                                                            <label for="user"
                                                                style="width: 150px; text-align: left;"><b>Email
                                                                    :</b></label>
                                                            <input type="text" placeholder="Nom d'utilisateur"
                                                                name="user" required style="margin-left: 20px;">
                                                        </div>
                                                        <div
                                                            style="display: flex; margin-top: 20px; margin-bottom: 20px;">
                                                            <label for="password"
                                                                style="width: 150px; text-align: left;"><b>Mot de passe
                                                                    :</b></label>
                                                            <input type="password" placeholder="Mot de passe"
                                                                name="password" required style="margin-left: 20px;">
                                                        </div>
                                                        <div
                                                            style="display: flex; margin-top: 20px; margin-bottom: 20px;">
                                                            <label for="password_retype"
                                                                style="width: 150px; text-align: left;"><b>Confirmez
                                                                    votre mot de passe
                                                                    :</b></label>
                                                            <input type="password" placeholder="Mot de passe"
                                                                name="password_retype" required
                                                                style="margin-left: 20px;">
                                                        </div>
                                                        <div style="display: flex; text-align: center; width: 100%;">
                                                            <button type="submit" style="margin: 0 auto;">S'inscrire
                                                            </button>
                                                        </div>
                                                        <div
                                                            style="display: flex; text-align: center; margin: 0 auto; margin-top: 10px;">

                                                            <p data-bs-toggle="modal" data-bs-target="#loginModal"
                                                                style="margin-right: 3px; width: 100%; color: #0070E0; text-decoration: underline; cursor: pointer;">
                                                                Se
                                                                connecter</p>

                                                            ou

                                                            <span class="psw" style="margin-left: 3px; width: 100%;">
                                                                mot de passe <a href="#">oublié?</a></span>
                                                        </div>


                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </li>
                        </ul>
                    </div>
            </nav>
        </header>

        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <main class="container-fluid d-flex justify-content-center align-items-center" style="margin-left: 2%;">
            <div class="header">
                <h2 class="text-center" style="color: aliceblue; margin-bottom: 30px; margin-top: 30px;">Actualité</h2>
                <a href="http://www.fitness-mag.fr/" target="_blank">
                    <img src="./assets/img/actu.png" class="img-fluid clickable" style="margin-left: 2%;"></a>
                <h2 class="text-center" style="color: aliceblue; margin-bottom: 30px; margin-top: 30px;">Activité</h2>
                <a href="./assets/page/service.php">
                    <img src="./assets/img/activité.png" class="img-fluid clickable" style="margin-left: 2%;"></a>
                <h2 class="text-center" style="color: aliceblue;  margin-bottom: 30px; margin-top: 30px;">Matériels</h2>
                <img src="./assets/img/matériels.png" class="img-fluid clickable" style="margin-left: 2%;">
                <h2 class="text-center" style="color: aliceblue; margin-bottom: 30px; margin-top: 30px;">Nos salles</h2>
                <img src="./assets/img/nossalles.png" class="img-fluid clickable"
                    style="margin-left: 2%; margin-bottom: 2%;">
            </div>
        </main>



        <footer class="bg-black text-light">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="https://www.youtube.com/" target="_blank"><img src="./assets/img/ytb.png"
                                class="img-fluid" style="width: 15%;"></a>
                        <a href="https://fr-fr.facebook.com/" target="_blank"><img src="./assets/img/facebook.png"
                                class="img-fluid" style="width: 15%;"></a>
                        <a href="https://www.instagram.com/" target="_blank"><img src="./assets/img/instagram.png"
                                class="img-fluid" style="width: 15%;"></a>
                        <a href="https://twitter.com/?lang=fr" target="_blank"><img
                                src="https://images.frandroid.com/wp-content/uploads/2023/07/logo-1.png"
                                class="img-fluid" style="width: 15%;"></a>
                    </div>
                    <!-- Bouton pour ouvrir le modal -->
                    <div class="col-md-6 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#contactModal">

                            Contactez-nous
                        </button>
                    </div>
                    <div class="col-md-3 text-right d-flex align-items-center">
                        <i class="fa-solid fa-phone" style="margin-right: 2%;"></i>
                        <p>02 34 56 78 91</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Le Modal -->
        <div id="contactModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" style="color: black;">Contactez-nous</h2>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form method="post" action="traitement.php">
                            <div class="form-group">
                                <label for="nom" style="color: black;">Nom :</label>
                                <input type="text" id="nom" name="nom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email" style="color: black;">Adresse e-mail :</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="message" style="color: black;">Message :</label>
                                <textarea id="message" name="message" class="form-control" rows="4"
                                    style="color: black;" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src="/assets/js/main.js"></script>


    </body>

</html>
<?php
session_start();
require_once '../../config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:../../index.php');
    die();
}

// On récupere les données de l'utilisateur
$req = $bdd->prepare('SELECT * FROM users WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://kit.fontawesome.com/93855b59f0.js" crossorigin="anonymous"></script>
        <title>The body studio - dashboard</title>
    </head>

    <body style="background-color: #413C3C; min-height: 100vh">

        <header class="h-100">
            <nav class="navbar navbar-expand-lg navbar-dark bg-black justify-content-center">
                <div class="container">
                    <a class="nav-link" href="/Projet_TBP">
                        <img src="../img/thebodystudio.png" class="logo1 float-left"></a>
                    <div class="cart-logo-container"></div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto text-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="/Projet_TBP">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../page/bio.php">Bio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../page/service.php">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../page/tarifs.php">Tarifs</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a class="nav-link" href="../page/contact.php">Contact</a> -->
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="../page/dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" style="margin-left:100vmin;">
                                    <i class="fa-solid fa-user fa-lg" style="color: #e7e9ed;"
                                        onclick="document.getElementById('id01').style.display='block'"
                                        style="width:auto;"></i>
                                </div>

                                <div id="id01" class="modal">
                                    <form class="modal-content animate" action="/action_page.php" method="post">
                                        <div class="imgcontainer">
                                            <span onclick="document.getElementById('id01').style.display='none'"
                                                class="close" title="Close Modal">&times;</span>
                                        </div>
                                        <div class="container">
                                            <label for="uname"><b>Nom d'utilisateur</b></label>
                                            <input type="text" placeholder="Nom d'utilisateur" name="uname" required>
                                            <label for="psw"><b>Mot de passe</b></label>
                                            <input type="password" placeholder="Mot de passe" name="psw" required>
                                            <button type="submit">Se connecter</button>
                                            <label>
                                                <input type="checkbox" checked="checked" name="remember"> se souvenir de
                                                moi
                                            </label>
                                            <a href="/assets/page/login.html" style="float: right;">Créer un compte</a>
                                        </div>
                                        <div class="container" style="background-color:#000000">
                                            <button type="button"
                                                onclick="document.getElementById('id01').style.display='none'"
                                                class="cancelbtn">Annuler</button>
                                            <span class="psw">mot de passe <a href="#">oublié?</a></span>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
            </nav>
        </header>

        <main class="container-fluid " style="min-height: 80vh; display: flex; align-items: center">

            <div class="container">
                <div class="col-md-12">
                    <?php
                    if (isset($_GET['err'])) {
                        $err = htmlspecialchars($_GET['err']);
                        switch ($err) {
                            case 'current_password':
                                echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                            case 'success_password':
                                echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break;
                        }
                    }
                    ?>


                    <div class="text-center">
                        <h1 class="p-5 text-white">Bonjour
                            <?php echo $data['user']; ?> !
                        </h1>
                        <hr />
                        <a href="../../deconnexion.php" class="btn btn-warning btn-lg">Déconnexion</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                            data-target="#change_password">
                            Changer mon mot de passe
                        </button>

                        <a href="../../delete.php" class="btn btn-danger btn-lg">Supprimer mon compte</a>


                    </div>
                </div>
            </div>






            <!-- Modal -->
            <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Changer mon mot de passe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../change_password.php" method="POST">
                                <label for='current_password'>Mot de passe actuel</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="form-control" required />
                                <br />
                                <label for='new_password'>Nouveau mot de passe</label>
                                <input type="password" id="new_password" name="new_password" class="form-control"
                                    required />
                                <br />
                                <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                <input type="password" id="new_password_retype" name="new_password_retype"
                                    class="form-control" required />
                                <br />
                                <button type="submit" class="btn btn-success">Sauvegarder</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Changer mon avatar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="layouts/change_avatar.php" method="POST" enctype="multipart/form-data">
                                <label for="avatar">Images autorisées : png, jpg, jpeg, gif - max 20Mo</label>
                                <input type="file" name="avatar_file">
                                <br />
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </form>
                        </div>
                        <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div> -->

        </main>

        <footer class="bg-black text-light">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="https://www.youtube.com/" target="_blank"><img src="../img/ytb.png" class="img-fluid"
                                style="width: 15%;"></a>
                        <a href="https://fr-fr.facebook.com/" target="_blank"><img src="../img/facebook.png"
                                class="img-fluid" style="width: 15%;"></a>
                        <a href="https://www.instagram.com/" target="_blank"><img src="../img/instagram.png"
                                class="img-fluid" style="width: 15%;"></a>
                        <a href="https://twitter.com/?lang=fr" target="_blank"><img
                                src="https://images.frandroid.com/wp-content/uploads/2023/07/logo-1.png"
                                class="img-fluid" style="width: 15%;"></a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="../page/contact.php">
                            <p> Nous contacter </p>
                        </a>
                    </div>
                    <div class="col-md-3 text-right d-flex">
                        <i class="fa-solid fa-phone" style="margin-right: 3%;"></i>
                        <p>02 34 56 78 91</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <script src="/assets/js/main.js"></script>
    </body>

</html>
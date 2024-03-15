<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://kit.fontawesome.com/93855b59f0.js" crossorigin="anonymous"></script>
        <title>The body studio - tarifs</title>
    </head>

    <body style="background-color: #413C3C;">

        <header class="h-100">
            <nav class="navbar navbar-expand-lg navbar-dark bg-black justify-content-center">
                <div class="container">
                    <a class="nav-link" href="/Projet_TBP">
                        <img src="../img/thebodystudio.png" class="logo1 float-left"></a>
                </div>
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
                            <a class="nav-link" href="./page/bio.php">Bio</a>
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
                                            <input type="checkbox" checked="checked" name="remember"> se souvenir de moi
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
        </header>>

        <main class="container-fluid d-flex justify-content-center align-items-center" style="margin-left: 2%;">
            <div class="sub" style="display: flex;">
                <div class="image-container">
                    <img src="../img/Rectangle 26.png" class="img-fluid" style="border-radius: 5%">
                    <div class="image-overlay">
                        <h2 class="image-title tarifh2">Formule au mois</h2>
                        <p class="image-paragraph">Explication de la formule au mois</p>
                        <a href="#" class="btn btn-secondary">Je m'abonne</a>
                    </div>
                </div>
                <div class="image-container">
                    <img src="../img/Rectangle 25.png" class="img-fluid" style="border-radius: 5%">
                    <div class="image-overlay">
                        <h2 class="image-title tarifh2">Formule à l'année</h2>
                        <p class="image-paragraph">Explication de la formule à l'année</p>
                        <a href="#" class="btn btn-secondary">Je m'abonne</a>
                    </div>
                </div>
            </div>
        </main>




        <footer class="bg-black text-light footer">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-3">
                        <div class="hd2">
                            <a href="https://www.youtube.com/" target="_blank"><img src="../img/ytb.png"
                                    class="img-fluid" style="width: 15%;"></a>
                            <a href="https://fr-fr.facebook.com/" target="_blank"><img src="../img/facebook.png"
                                    class="img-fluid" style="width: 15%;"></a>
                            <a href="https://www.instagram.com/" target="_blank"><img src="../img/instagram.png"
                                    class="img-fluid" style="width: 15%;"></a>
                            <a href="https://twitter.com/?lang=fr" target="_blank"><img
                                    src="https://images.frandroid.com/wp-content/uploads/2023/07/logo-1.png"
                                    class="img-fluid" style="width: 15%;"></a>
                        </div>
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
        <script src="/assets/js/main.js"></script>
    </body>

</html>
<!DOCTYPE html>
<html>

    <head>
        <title>Traitement du formulaire</title>
    </head>

    <body>

        <div class="container">
            <h2>Récapitulatif des données soumises:</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $prenom = $_POST["prenom"];
                $nom = $_POST["nom"];
                $email = $_POST["email"];
                $message = $_POST["message"];

                echo "<p><strong>Prénom :</strong> $prenom</p>";
                echo "<p><strong>Nom :</strong> $nom</p>";
                echo "<p><strong>Adresse e-mail :</strong> $email</p>";
                echo "<p><strong>Message :</strong> $message</p>";
            } else {
                echo "Aucune donnée soumise.";
            }
            ?>
        </div>

    </body>

</html>

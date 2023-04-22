<?php
require '../Controleur/gestionUtilisateur.php';

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>| Login</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="inner_box" id="card">
                <div class="card_front">
                    <h2>Se Connecter</h2>
                    <?php
                    if (isset($errors) && count($errors) > 0) {
                        foreach ($errors as $error_msg) {
                            echo '<p>' . $error_msg . '</p>';
                        }
                    }
                    ?>
                    <form method="post">
                        <input type="email" class="input_box" placeholder="Votre Email" name="email">
                        <input type="password" class="input_box" placeholder="Mot de Passe" name="password">
                        <button type="submit" class="submit_btn" name="btn_login">Envoyer</button>
                        <input type="checkbox"><span>Remember me</span>
                    </form>
                    <button type="submit" class="btn" onclick="openRegister()">I'm new here</button>

                </div>
                <div class="card_back">
                    <h2>S'enregistrer</h2>
                    <?php
                    if (isset($errors) && count($errors) > 0) {
                        foreach ($errors as $error_msg) {
                            echo '<p>' . $error_msg . '</p>';
                        }
                    }

                    if (isset($success)) {

                        echo '<p>' . $success . '</p>';
                    }
                    ?>
                    <form method="post">
                        <input type="text" class="input_box" placeholder=" Votre nom d'utilisateur" name="username" required>
                        <input type="email" class="input_box" placeholder="Votre Email" name="email" required>
                        <input type="password" class="input_box" placeholder="Mot de Passe" name="password" required>
                        <button type="submit" class="submit_btn" name="btn_register">Envoyer</button>
                        <input type="checkbox"><span>Remember me</span>
                    </form>
                    <button type="submit" class="btn" onclick="openLogin()">I've an account</button>
                </div>
            </div>
        </div>

        <p class="retour"><a href="./dashboard.php">Retour ver la page Principale</a></p>

        <script>
            var card = document.getElementById("card");

            function openRegister() {
                card.style.transform = "rotateY(-180deg)";
            }

            function openLogin() {
                card.style.transform = "rotateY(0deg)";
            }
        </script>

</body>

</html>
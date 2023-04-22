<?php
require '../Controleur/gestionUtilisateur.php';
require '../Controleur/main.php';

$nom = null;

if (!empty($_COOKIE['utilisateur'])) {
    $nom = $_COOKIE['utilisateur'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/tirage.css">
    <link rel="stylesheet" href="./css/load.css">
    <link rel="stylesheet" href="mediaqr.css">
    <link rel="stylesheet" href="./css/about.css">

    <title>| Dashboard</title>
</head>

<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <div class="u_name">
            <img src="images/Logopitfoot.png" alt="">
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>

        </div>
        <div class="search">
            <input type="search" placeholder="Search ...">
            <i class="fa fa-search" aria-idden="true"></i>
        </div>
        <div class="user_active">
            <?php if ($nom): ?>
                <p>
                    <?= htmlentities($nom) ?>
                </p>
            <?php endif ?>
            <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
        </div>

    </header>
    <div class="body">
        <nav class="side_bar">
            <div class="user_p">
                <img src="./images/pngworld-cup.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="../Vue/tirage.php">
                        <i class="fa fa-play-circle" aria-idden="true"></i>
                        <span>Tirage</span></a>
                </li>
                <li>
                    <a href="../Vue/matchgroupe.php">
                        <i class="fa fa-gamepad" aria-hidden="true"></i> <span>Match / Groupe</span></a>
                </li>
                <li>
                    <a href="../Vue/classementmatch.php">
                        <i class="fa fa-futbol-o" aria-hidden="true"></i>
                        <span>Classement</span></a>
                </li>
                <li>
                    <a href="../Vue/demifinal.php">
                        <i class="fa fa-cog" aria-idden="true"></i>
                        <span>Demi-Final</span></a>
                </li>
                <li>
                    <a href="../Vue/petitefinale.php">
                        <i class="fa fa-cog" aria-idden="true"></i>
                        <span>Troisieme Place</span></a>
                </li>
                <li>
                    <a href="../Vue/finale.php">
                        <i class="fa fa-cog" aria-idden="true"></i>
                        <span>Grande Finale</span></a>
                </li>
                <li>
                    <a href="../Vue/logout.php">
                        <i class="fa fa-power-off" aria-idden="true"></i>
                        <span>LogOut</span></a>
                </li>
                <li class="act">
                    <a href="../Vue/about.php">
                        <i class="fa fa-about" aria-idden="true"></i>
                        <span>About</span></a>
                </li>
            </ul>
        </nav>
        <div class="back">
            <!-- La vue contient l'interface graphique -->

            <div class="text">
                <h1>A PROPOS</h1><br>
                <p>
                    L’application Coupe 3e Info est un logiciel qui permet simuler des séries de matchs avec
                    des équipes préalablement définies en temps réel. L’application fait la gestion du tirage au sort
                    des équipes, la gestion des classements et la gestion des confrontations (premier et deuxième tour).
                    Le tournoi comprend 8 équipes, 2 groupes et 4 équipes par groupes.
                </p><br>
                <p>
                    Apprendre à utiliser ce logiciel n’a rien de compliqué, mais cela suppose de bien comprendre
                    les termes, les concepts et les méthodes employés dans l’ouvrage Coupe 3e Info – Logiciel
                    de simulation de matchs : Manuel de l’utilisateur. Nous vous conseillerons d’utiliser ce manuel
                    en détail avant d’utiliser le logiciel.
                </p><br>
                <p><i>
                        << On dispose d'un guide utilisateur qui vous permet de bien manipuler l'application>>
                    </i></p>
            </div>

            <section>
                <center>
                    <h1>Programmeurs</h1>
                </center>

                <div class="container-1">
                    <img src="./images/imagesbands/Christan.jpg" alt="Christan">
                    <div class="cont-1">
                        <h3>ING. Christan Denison VICTOR</h3>
                        <p>
                            Etudiant en Sciences Informatiques à l'Université INUKA <br>
                            en Haiti, chef de projet, realisateur, programmeur/designeur,le concepteur du groupe
                            <b>Coupe 3eme Info</b>
                        </p>
                    </div>
                </div>
                <div class="container-2">
                    <div class="cont-2">
                        <h3>ING. Joberno Birlado Joseph</h3>
                        <p>
                            Etudiant en Sciences Informatiques à l'Université INUKA <br>
                            en Haiti, analayste programmeur, realisateur ,DBA du <b>Coupe 3eme Info</b>
                        </p>
                    </div>
                    <img src="./images/imagesbands/joberno.png" alt="Joberno">
                </div>

                <div class="container-1">
                    <img src="./images/imagesbands/Dadensky.jpg" alt="Dadensky">
                    <div class="cont-1">
                        <h3>ING. Jeff Dadensky PIERRE</h3>
                        <p>
                            Etudiant en Sciences Informatiques à l'Université INUKA <br>
                            en Haiti, realisateur, designeur/programmeur,le concepteur du groupe <b>Coupe 3eme Info</b>
                        </p>
                    </div>
                </div>

                <div class="container-2">
                    <div class="cont-2">
                        <h3>ING. Wills BREDY</h3>
                        <p>
                            Etudiant en Sciences Informatiques à l'Université INUKA <br>
                            en Haiti, niveau 3ème année, realisateur, designeur/programmeur,le mise en charge du
                            <b>Coupe 3eme Info</b><br>
                        </p>
                    </div>
                    <img src="./images/imagesbands/Bredy.JPG" alt="Bredy">
                </div>
            </section>

        </div>
    </div>
</body>

</html>
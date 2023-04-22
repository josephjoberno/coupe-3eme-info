<?php
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
    <link rel="stylesheet" href="mediaqr.css">

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
            <?php if ($nom) : ?>
                <p><?= htmlentities($nom) ?></p>
            <?php endif ?>
            
            <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
        </div>
    </header>
    <div class="body">
        <nav class="side_bar">
            <div class="user_p">
                <img src="images/pngworld-cup.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="../Vue/tirage.php">
                        <i class="fa fa-play-circle" aria-idden="true"></i>
                        <span>Tirage</span></a>
                </li>
                <li>
                    <a href="../Vue/matchgroupe.php">
                    <i class="fa fa-gamepad" aria-hidden="true"></i>                        <span>Match / Groupe</span></a>
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
                <li class="act">
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
                <li>
                    <a href="../Vue/about.php">
                    <i class="fa fa-futbol-o" aria-hidden="true"></i>
                        <span>About</span></a>
                </li>
            </ul>
        </nav>
        <div class="back">
            <!-- La vue contient l'interface graphique -->

            <section class="section_1">
                <div class="sect1">
                    <!-- Troisieme Place -->
                    <table>
                        <p><i>Troisieme Place - Petite Finale</i></p>
                        <tr id="header">
                            <th><strong>Troisieme Place</strong></th>
                            <th>Affiche</th>
                            <th>Score</th>
                            <th></th>
                        </tr>

                        <tr>

                            <td>Match15</td>
                            <td><img src="<?= isset($resultDemi->equipePerdante) ? flag($resultDemi->equipePerdante) : '---'?>"> <?= isset($resultDemi->equipePerdante) ? $resultDemi->equipePerdante : '---' ?> VS <?= isset($resultDemi1->equipePerdante) ? $resultDemi1->equipePerdante : '---' ?> <img src="<?=isset($resultDemi1->equipePerdante) ? flag($resultDemi1->equipePerdante) : '---'?>"></td>
                            <form action="../Controleur/traitementMatch.php" method="post">
                                <td>
                                    <input type="number" name="score29" min=0 max=5 class="score" <?php if (isset($_SESSION['match15']) && $_SESSION['match15']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score29'])) echo $_SESSION['score29']; ?>" required>
                                    vs <input type="number" name="score30" min=0 max=5 class="score" <?php if (isset($_SESSION['match15']) && $_SESSION['match15']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score30'])) echo $_SESSION['score30']; ?>" required>
                                </td>
                                <td><button type="submit" name="match" value="match15" <?php if (isset($_SESSION['match15']) && $_SESSION['match15']) echo 'disabled'; ?>>Jouer</button></td>
                            </form>
                        </tr>
                        <p id="gagnant">Gagnant : <span><?= isset($resultPetiteFinale->equipeGagnante) ? $resultPetiteFinale->equipeGagnante : '---' ?></span></p>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <style>
        #gagnant{
            font-size: xx-large;
            color: white;
            font-family: 'Century Gothic';
        }
        .sect1 p{
            color:white;
            font-size: 18px;
            margin: 5px;
        }
        #gagnant span{
            color: brown;
        }
        input[type="number"]{text-align: center;}
    </style>
</body>
</html>
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
                <li class="act">
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
                <li>
                    <a href="../Vue/about.php">
                    <i class="fa fa-futbol-o" aria-hidden="true"></i>
                        <span>About</span></a>
                </li>
            </ul>
        </nav>
        <div class="back">

            <section class="section_1">
                <div class="sect1">

                    <!-------------------------------------------- DEMI-FINALE ---------------------------------------------->

                    <table>


                        <p><i>Demi-Finale</i></p>
                        <tr id="header">
                            <th><strong>Demi-Finale</strong></th>
                            <th>Affiche</th>
                            <th>Score</th>
                            <th></th>
                        </tr>

                        <p><?= isset($_SESSION['equipeGagnante']) ? $_SESSION['equipeGagnante'] : '' ?></p>
                        <tr>
                            <td>Match 13</td>
                            <td><img src="<?php echo flag($resultCA1[0]['nomEquipe'] );?>"> <?= $resultCA1[0]['nomEquipe'] . ' VS ' . $resultCB1[1]['nomEquipe'] ?> <img src="<?php echo flag($resultCB1[1]['nomEquipe'] );?>"></td>
                            <form action="<?= '../Controleur/traitementMatch.php?equipe1=' . $resultCA1[0]['nomEquipe'] . '&equipe2=' . $resultCB1[1]['nomEquipe'] ?>" method="post">
                                <td>
                                    <input type="number" name="score25" min=0 max=5 class="score" <?php if (isset($_SESSION['match13']) && $_SESSION['match13']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score25'])) echo $_SESSION['score25']; ?>" required>
                                    vs <input type="number" name="score26" min=0 max=5 class="score" <?php if (isset($_SESSION['match13']) && $_SESSION['match13']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score26'])) echo $_SESSION['score26']; ?>" required>
                                </td>
                                <td><button type="submit" name="match" value="match13" <?php if (isset($_SESSION['match13']) && $_SESSION['match13']) echo 'disabled'; ?>>Jouer</button></td>
                            </form>
                        </tr>

                        <tr>
                            <td>Match 14</td>
                            <td><img src="<?php echo flag($resultCB1[0]['nomEquipe'] );?>"> <?= $resultCB1[0]['nomEquipe'] . ' VS ' . $resultCA1[1]['nomEquipe'] ?> <img src="<?php echo flag($resultCA1[1]['nomEquipe']);?>"></td>
                            <form action="<?= '../Controleur/traitementMatch.php?equipe1=' . $resultCB1[0]['nomEquipe'] . '&equipe2=' . $resultCA1[1]['nomEquipe'] ?>" method="post">
                                <td>
                                    <input type="number" name="score27" min=0 max=5 class="score" <?php if (isset($_SESSION['match14']) && $_SESSION['match14']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score27'])) echo $_SESSION['score27']; ?>" required>
                                    vs <input type="number" name="score28" min=0 max=5 class="score" <?php if (isset($_SESSION['match14']) && $_SESSION['match14']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score28'])) echo $_SESSION['score28']; ?>" required>
                                </td>
                                <td><button type="submit" name="match" value="match14" <?php if (isset($_SESSION['match14']) && $_SESSION['match14']) echo 'disabled'; ?>>Jouer</button></td>
                            </form>
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <style>
        input[type="number"]{text-align: center;}
    </style>
</body>

</html>
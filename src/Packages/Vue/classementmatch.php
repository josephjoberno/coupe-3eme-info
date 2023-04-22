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
                <li class="act">
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
                <div class="sect_tabl">
                    <!---------------------------------------- Classement Groupe A ---------------------------------------->
                    <p class="affich1tr1">Classement Groupe A</p>
                    <table class="affiche1">
                        <tr>
                            <th colspan="10">Groupe A</th>
                        </tr>

                        <tr id="header">
                            <td></td>
                            <td></td>
                            <td>MJ</td>
                            <td>MG</td>
                            <td>MN</td>
                            <td>MP</td>
                            <td>BP</td>
                            <td>BC</td>
                            <td>Dif</td>
                            <td>Point</td>
                        </tr>

                        <?php for ($i = 0; $i < 2; $i++) : ?>
                            <tr>
                                <td></td>
                                <td><img src="<?php echo flag($resultCA1[$i]['nomEquipe'] );?>"> <?= $resultCA1[$i]['nomEquipe'] ?></td>
                                <td><?= $resultCA1[$i]['matchJouer'] ?>
                                <td><?= $resultCA1[$i]['matchGagner'] ?>
                                <td><?= $resultCA1[$i]['matchNull'] ?>
                                <td><?= $resultCA1[$i]['matchPerdu'] ?>
                                <td><?= $resultCA1[$i]['butPour'] ?>
                                <td><?= $resultCA1[$i]['butContre'] ?>
                                <td><?= $resultCA1[$i]['difference'] ?>
                                <td><?= $resultCA1[$i]['point'] ?>
                            </tr>

                        <?php endfor; ?>



                        <?php for ($i = 0; $i < 2; $i++) : ?>
                            <tr>
                            <td></td>
                                <td><img src="<?php echo flag($resultCA2[$i]['nomEquipe'] );?>"> <?= $resultCA2[$i]['nomEquipe'] ?></td>
                                <td><?= $resultCA2[$i]['matchJouer'] ?>
                                <td><?= $resultCA2[$i]['matchGagner'] ?>
                                <td><?= $resultCA2[$i]['matchNull'] ?>
                                <td><?= $resultCA2[$i]['matchPerdu'] ?>
                                <td><?= $resultCA2[$i]['butPour'] ?>
                                <td><?= $resultCA2[$i]['butContre'] ?>
                                <td><?= $resultCA2[$i]['difference'] ?>
                                <td><?= $resultCA2[$i]['point'] ?>
                            </tr>
                        <?php endfor; ?>
                    </table>

                    <!----------------------------------- Classement Groupe B ----------------------------------------->

                    <p class="affich1tr2">Classement Groupe B</p>
                    <table class="affiche2">
                        <tr>
                            <th colspan="10">Groupe B</th>

                        </tr>

                        <tr id="header">
                            <td></td>
                            <td></td>
                            <td>MJ</td>
                            <td>MG</td>
                            <td>MN</td>
                            <td>MP</td>
                            <td>BP</td>
                            <td>BC</td>
                            <td>Dif</td>
                            <td>Point</td>


                        </tr>

                        <?php for ($i = 0; $i < 2; $i++) : ?>
                            <tr>
                            <td></td>
                                <td><img src="<?php echo flag($resultCB1[$i]['nomEquipe'] );?>"> <?= $resultCB1[$i]['nomEquipe'] ?></td>
                                <td><?= $resultCB1[$i]['matchJouer'] ?>
                                <td><?= $resultCB1[$i]['matchGagner'] ?>
                                <td><?= $resultCB1[$i]['matchNull'] ?>
                                <td><?= $resultCB1[$i]['matchPerdu'] ?>
                                <td><?= $resultCB1[$i]['butPour'] ?>
                                <td><?= $resultCB1[$i]['butContre'] ?>
                                <td><?= $resultCB1[$i]['difference'] ?>
                                <td><?= $resultCB1[$i]['point'] ?>
                            </tr>

                        <?php endfor; ?>

                        <?php for ($i = 0; $i < 2; $i++) : ?>
                            <tr>
                            <td></td>
                                <td><img src="<?php echo flag($resultCB2[$i]['nomEquipe'] );?>"> <?= $resultCB2[$i]['nomEquipe'] ?></td>
                                <td><?= $resultCB2[$i]['matchJouer'] ?>
                                <td><?= $resultCB2[$i]['matchGagner'] ?>
                                <td><?= $resultCB2[$i]['matchNull'] ?>
                                <td><?= $resultCB2[$i]['matchPerdu'] ?>
                                <td><?= $resultCB2[$i]['butPour'] ?>
                                <td><?= $resultCB2[$i]['butContre'] ?>
                                <td><?= $resultCB2[$i]['difference'] ?>
                                <td><?= $resultCB2[$i]['point'] ?>
                            </tr>
                        <?php endfor; ?>

                    </table>
                </div>
            </section>
        </div>
    </div>
    <style>
        .affiche1 {
            position: absolute;
            left: 50%;
            top: 25%;
        }

        .affiche2 {
            position: absolute;
            left: 50%;
            top: 80%;

        }

        .sect_tabl::-webkit-scrollbar {
            width: 15px;
        }

   

        .sect_tabl::-webkit-scrollbar-thumb {
            background-color: rgba(28, 77, 145, 0.829);
        }


        iframe {
            width: 100%;
            height: 100vh;
        }

        .sect_tabl {
            position: absolute;
            overflow: scroll;
            width: 100%;
            height:90vh;
        }

        .affich1tr1 {
            display: none;
            position: absolute;
            top: 5%;
            color: white;
            text-align: center;
            font-family: Century Gothic;
            color: #B06A02;
            font-size: 1.4rem;
        }

        .affich1tr2 {
            display: none;
            position: absolute;
            top: 65%;
            color: white;
            text-align: center;
            font-family: Century Gothic;
            color: #B06A02;
            font-size: 1.4rem;
        }
    </style>
</body>

</html>
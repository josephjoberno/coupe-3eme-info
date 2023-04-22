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
                <li>
                    <a href="../Vue/petitefinale.php">
                        <i class="fa fa-cog" aria-idden="true"></i>
                        <span>Troisieme Place</span></a>
                </li>
                <li class="act">
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
                    <a href="../Vue/statistics.html">
                        <i class="fa fa-futbol-o" aria-hidden="true"></i>
                        <span>Statistics</span></a>
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
                    <!-- GRANDE FINALE -->

                    <table>
                        <tr id="header">
                            <th>Finale</th>
                            <th>Affiche</th>
                            <th>Score</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td>Match 16</td>
                            <td><img src="<?= isset($resultDemi->equipeGagnante) ? flag($resultDemi->equipeGagnante) : '---' ?>"> <?= isset($resultDemi->equipeGagnante) ? $resultDemi->equipeGagnante : '---' ?> VS <?= isset($resultDemi1->equipeGagnante) ? $resultDemi1->equipeGagnante : '---' ?> <img src="<?= isset($resultDemi1->equipeGagnante) ? flag($resultDemi1->equipeGagnante) : '---' ?>"></td>
                            <form action="../Controleur/traitementMatch.php" method="post">
                                <td>
                                    <input type="number" name="score31" min=0 max=5 class="score" <?php if (isset($_SESSION['match16']) && $_SESSION['match16']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score31'])) echo $_SESSION['score31']; ?>" required>
                                    vs <input type="number" name="score32" min=0 max=5 class="score" <?php if (isset($_SESSION['match16']) && $_SESSION['match16']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score32'])) echo $_SESSION['score32']; ?>" required>
                                </td>
                                <td><button type="submit" name="match" value="match16" <?php if (isset($_SESSION['match16']) && $_SESSION['match16']) echo 'disabled'; ?>>Jouer</button></td>
                            </form>
                        </tr>
                    </table>



                    <button class="btn_t"> Click Here</button>
                    <div class="popup">
                        <p class="title_Gagnant">Grande Finale</p>
                        <p id="gagnant">Gagnant : <span class="equipe"><?= isset($resultFinale->equipeGagnante) ? $resultFinale->equipeGagnante : '---' ?></span></p>
                        <p id="perdant">2nd place : <span class="equipe2"><?= isset($resultFinale->equipePerdante) ? $resultFinale->equipePerdante : '---' ?></span></p>

                        <b class="close">x</b>

                    </div>
                </div>
            </section>
            <canvas id="my-canvas"></canvas>
            <script src="./js/footanim.min.js"></script>

            <!-- popup javascript -->
            <script>
                let btn_t = document.querySelector(".btn_t");
                let popup = document.querySelector(".popup");
                let close = document.querySelector(".close");
                let confe = document.querySelector("#my-canvas");
                let audio = new Audio('./musique/K naan - Wavin  Flag (Coca-Cola  Celebration Mix).mp3');

                btn_t.onclick = function() {
                    popup.classList.add('active');
                    confe.classList.add('active');
                    audio.play();
                    audio.classList.play('active');
                }
                close.onclick = function() {
                    popup.classList.remove('active');
                    confe.classList.remove('active');

                }




                var confettiSettings = {
                    target: 'my-canvas'
                };
                var confetti = new ConfettiGenerator(confettiSettings);
                confetti.render();
            </script>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .sect1 p {
            color: white;
            font-size: 18px;
            margin: 5px;
        }



        input[type="number"] {
            text-align: center;
        }

        /* popup */
   

        .btn_t {
            padding: 15px 25px;
            margin-top: 20px;
            font-size: 1.1em;
            cursor: pointer;
        }

        .popup .title_Gagnant {
            color: #1077DD;
            text-align: center;
            font-size: 3.1rem;
            font-family: Vivaldi;
        }

        #gagnant,
        #perdant {

            position: relative;
            top: 10%;
            text-align: center;
            font-family: 'Century Gothic';
            font-size: 1.9rem;

        }

        .popup #gagnant {
            color: rgb(90, 18, 18);
            font-size: 1.3em;

        }

        .popup .equipe {
            color: #A37532;
            font-size: 1.4em;
            font-family: 'Century Gothic';

        }

        .popup .equipe2 {
            font-size: 1.4em;
             color: rgb(4, 75, 4);
            font-family: 'Century Gothic';


        }

        .popup #perdant {
            color: rgb(90, 18, 18);
            font-size: 1.2em;
            margin-top: 12px;

        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            width: 450px;
            height: 300px;
            
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1), 0 0 0 1000px rgba(255, 255, 255.095);
          
            padding: 40px;
            visibility: hidden;
            border-left: none;
        }

        .popup.active {
            visibility: visible;
        }

        .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px 20px;
            background: #fff;
            cursor: pointer;
            background: red;
            color: #fff;
        }

        #my-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 100000;
            visibility: hidden;
            pointer-events: none;
        }

        #my-canvas.active {
            visibility: visible;
        }
    </style>
</body>

</html>
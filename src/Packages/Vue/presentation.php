<?php
session_start();

// require section
require '../../log.php';
require_once '../../connectionDatabase.php';



// variable de connection a la base de donnee
$bdd = loadDb();


//creation des equipes par lot dans un array associative
$_SESSION['equipe'] = [
    "lot1" => ['Argentine', 'Bresil'],
    "lot2" => ['France', 'Italie'],
    "lot3" => ['Espagne', 'Allemagne'],
    "lot4" => ['Portugal', 'Haiti']
];


//random pour la gestion de la premeere tete de serie
$indicePremierA = rand(0, 1);
$indicePremierB = rand(0, 1);
while ($indicePremierA == $indicePremierB) {
    $indicePremierB = rand(0, 1);
}
//random pour la gestion de la deuxieme tete de serie
$indiceDeuxiemeA = rand(0, 1);
$indiceDeuxiemeB = rand(0, 1);
while ($indiceDeuxiemeA == $indiceDeuxiemeB) {
    $indiceDeuxiemeB = rand(0, 1);
}
//random pour la gestion de la troisieme tete de serie
$indiceTroisiemeA = rand(0, 1);
$indiceTroisiemeB = rand(0, 1);
while ($indiceTroisiemeA == $indiceTroisiemeB) {
    $indiceTroisiemeB = rand(0, 1);
}
//random pour la gestion de la quat tete de serie
$indiceQuatriemeA = rand(0, 1);
$indiceQuatriemeB = rand(0, 1);
while ($indiceQuatriemeA == $indiceQuatriemeB) {
    $indiceQuatriemeB = rand(0, 1);
}

// les equipes apres le tirage

//==============>Groupe A<===================
$teteDeSerieA1 = $_SESSION['equipe']["lot1"][$indicePremierA];
$teteDeSerieA2 = $_SESSION['equipe']["lot2"][$indiceDeuxiemeA];
$teteDeSerieA3 = $_SESSION['equipe']["lot3"][$indiceTroisiemeA];
$teteDeSerieA4 = $_SESSION['equipe']["lot4"][$indiceQuatriemeA];

//==============>Groupe B<===================
$teteDeSerieB1 = $_SESSION['equipe']["lot1"][$indicePremierB];
$teteDeSerieB2 = $_SESSION['equipe']["lot2"][$indiceDeuxiemeB];
$teteDeSerieB3 = $_SESSION['equipe']["lot3"][$indiceTroisiemeB];
$teteDeSerieB4 = $_SESSION['equipe']["lot4"][$indiceQuatriemeB];

 //selection a la base pour le groupe A

 $sqlQ1 = 'SELECT * FROM GroupeA WHERE id=(SELECT max(id) FROM GroupeA)';
 $result1 = $bdd->query($sqlQ1);
 $myResult1 = $result1->fetch(PDO::FETCH_OBJ);

  //selection a la base pour le groupe B
  $sqlQ2 = 'SELECT * FROM GroupeB WHERE id=(SELECT max(id) FROM GroupeB)';
  $result2 = $bdd->query($sqlQ2);
  $myResult2 = $result2->fetch(PDO::FETCH_OBJ);

// ajout des equipes a la base de donnees
if (isset($_POST['tirage'])) {
    //supression des anciennes tirages
    $bdd->query('DELETE FROM GROUPEA');
    $bdd->query('DELETE FROM GROUPEB');

    // ajout a la base 
    $sqlA = 'INSERT INTO GroupeA(teteDeSerieA1,teteDeSerieA2,teteDeSerieA3,teteDeSerieA4) VALUES(?,?,?,?)';
    $sqlB = 'INSERT INTO GroupeB(teteDeSerieB1,teteDeSerieB2,teteDeSerieB3,teteDeSerieB4) VALUES(?,?,?,?)';

    $bdd->prepare($sqlA)->execute([$teteDeSerieA1, $teteDeSerieA2, $teteDeSerieA3, $teteDeSerieA4]);
    $bdd->prepare($sqlB)->execute([$teteDeSerieB1, $teteDeSerieB2, $teteDeSerieB3, $teteDeSerieB4]);

    header('Location:presentation.php');

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue</title>
    <link rel="stylesheet" href="./presentation.css">

    <style>

    </style>
</head>

<body>



    <!-- La vue contient l'interface graphique -->
    <section class="container">

        <marquee behavior="" direction="rigth">
            <h1>Coupe 3<sup>e</sup> Info</h1>
        </marquee>
        <hr>

        <form action="" method="post">
            <table>
                <tr>
                    <th>Lot # 1 (1<sup>e</sup> tete de série)</th>
                    <th>Lot # 2 (2<sup>e</sup> tete de série)</th>
                    <th>Lot # 3 (3<sup>e</sup> tete de série)</th>
                    <th>Lot # 4 (4<sup>e</sup> tete de série)</th>
                </tr>

                <tr>
                    <td>Bresil</td>
                    <td>France</td>
                    <td>Espagne</td>
                    <td>Portugal</td>
                </tr>

                <tr>
                    <td>Argentine</td>
                    <td>Italie</td>
                    <td>Allemagne</td>
                    <td>Haiti</td>
                </tr>
            </table>

            <button type="submit" name="tirage">Tirage</button>
        </form>


        <h2>Les Groupes</h2>
        <hr>

        <table>
            <tr>
                <th></th>
                <th>Groupe A</th>
                <th>Groupe B</th>
            </tr>


            <tr>
                <td>1<sup>e</sup> tete de serie (TDS)</td>
                <td><?= $myResult1->teteDeSerieA1 ?></td>
                <td><?= $myResult2->teteDeSerieB1 ?></td>
            </tr>

            <tr>
                <td>2<sup>e</sup> tete de serie (TDS)</td>
                <td><?= $myResult1->teteDeSerieA2 ?></td>
                <td><?= $myResult2->teteDeSerieB2 ?></td>
            </tr>

            <tr>
                <td>3<sup>e</sup> tete de serie (TDS)</td>
                <td><?= $myResult1->teteDeSerieA3 ?></td>
                <td><?= $myResult2->teteDeSerieB3 ?></td>
            </tr>

            <tr>
                <td>4<sup>e</sup> tete de serie (TDS)</td>
                <td><?= $myResult1->teteDeSerieA4 ?></td>
                <td><?= $myResult2->teteDeSerieB4 ?></td>
                <td></td>
            </tr>
        </table>

  
        <!-- Match Groupe A -->

        <section class="display_validation">
            <table>
                <p>Affiche 1<sup>e</sup> tour</p>
                <tr>
                    <th>Groupe A</th>
                    <th>Affiche</th>
                    <th>Score</th>
                    <th></th>
                </tr>

                <tr>
                    <td>Match 1</td>
                    <td><?= $myResult1->teteDeSerieA1 . ' VS ' . $myResult1->teteDeSerieA2 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 2</td>
                    <td><?= $myResult1->teteDeSerieA3. ' VS ' . $myResult1->teteDeSerieA4 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 3</td>
                    <td><?= $myResult1->teteDeSerieA1 . ' VS ' . $myResult1->teteDeSerieA3 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 4</td>
                    <td><?= $myResult1->teteDeSerieA2 . ' VS ' . $myResult1->teteDeSerieA4 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 5</td>
                    <td><?= $myResult1->teteDeSerieA1 . ' VS ' . $myResult1->teteDeSerieA4 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 6</td>
                    <td><?= $myResult1->teteDeSerieA2 . ' VS ' . $myResult1->teteDeSerieA3 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

            </table><br>

            <!-- Match Groupe B -->

            <table>
                <tr>
                    <th>Groupe B</th>
                    <th>Affiche</th>
                    <th>Score</th>
                    <th></th>
                </tr>

                <tr>
                    <td>Match 7</td>
                    <td><?= $myResult2->teteDeSerieB1 . ' VS ' . $myResult2->teteDeSerieB2 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 8</td>
                    <td><?= $myResult2->teteDeSerieB3 . ' VS ' . $myResult2->teteDeSerieB4 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 9</td>
                    <td><?= $myResult2->teteDeSerieB1 . ' VS ' . $myResult2->teteDeSerieB3 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 10</td>
                    <td><?= $myResult2->teteDeSerieB2 . ' VS ' . $myResult2->teteDeSerieB4 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 11</td>
                    <td><?= $myResult2->teteDeSerieB1 . ' VS ' . $myResult2->teteDeSerieB4 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 12</td>
                    <td><?= $myResult2->teteDeSerieB2 . ' VS ' . $myResult2->teteDeSerieB3 ?></td>
                    <form action="" method="post">
                        <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                        <td><button type="submit">Jouer</button></td>
                    </form>
                </tr>

                <!-- Classement Groupe A -->


            </table>

            <hr>
            <p>Classement Groupe A</p>
            <table>
                <tr>
                    <th colspan="9">Groupe A</th>
                </tr>

                <tr>
                    <td></td>
                    <td>MJ</td>
                    <td>MG</td>
                    <td>MN</td>
                    <td>MP<MP /td>
                    <td>BP</td>
                    <td>BC</td>
                    <td>Dif</td>
                    <td>Point</td>
                </tr>

                <tr>
                    <td>Premier</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Deuxieme</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Troisieme</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Quatrieme</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <!-- Classement Groupe B -->

            <table>

                <p>Classement Groupe B</p>
                <table>
                    <tr>
                        <th colspan="9">Groupe B</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td>MJ</td>
                        <td>MG</td>
                        <td>MN</td>
                        <td>MP<MP /td>
                        <td>BP</td>
                        <td>BC</td>
                        <td>Dif</td>
                        <td>Point</td>
                    </tr>

                    <tr>
                        <td>Premier</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Deuxieme</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Troisieme</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Quatrieme</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>

                <!-- Demi-Finale -->

                <table>


                    <p><i>Demi-Finale</i></p>
                    <tr>
                        <th><strong>Demi-Finale</strong></th>
                        <th>Affiche</th>
                        <th>Score</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td>Match 13</td>
                        <td>1eA VS 2eB</td>
                        <form action="" method="post">
                            <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                            <td><button type="submit">Jouer</button></td>
                        </form>
                    </tr>

                    <tr>
                        <td>Match 14</td>
                        <td>1eB VS 2eA</td>
                        <form action="" method="post">
                            <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                            <td><button type="submit">Jouer</button></td>
                        </form>
                    </tr>
                </table>

                <!-- Troisieme Place -->
                <table>
                    <p><i>Troisieme Place - Petite Finale</i></p>
                    <tr>
                        <th><strong>Troisieme Place</strong></th>
                        <th>Affiche</th>
                        <th>Score</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td>Match 15</td>
                        <td>P13 VS P14</td>
                        <form action="" method="post">
                            <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                            <td><button type="submit">Jouer</button></td>
                        </form>
                    </tr>
                </table>

                <!-- GRANDE FINALE -->

                <hr>
                <p><i>Grande Finale</i></p>

                <table>
                    <tr>
                        <th>Finale</th>
                        <th>Affiche</th>
                        <th>Score</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td>Match 16</td>
                        <td>V13 VS V14</td>
                        <form action="" method="post">
                            <td><input type="number" name="score" min=0 max=5 class="score"> vs <input type="number" name="score" min=0 max=5 class="score"></td>
                            <td><button type="submit">Jouer</button></td>
                        </form>
                    </tr>
                </table>
        </section>

    </section>
    <script src="../js/script.js"></script>
</body>

</html>
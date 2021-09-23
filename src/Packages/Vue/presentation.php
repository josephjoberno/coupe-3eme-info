<?php
session_start();
//creation des sessions pour les matchs



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
    // reinitialisation des sessions
    session_destroy();

    //supression des anciennes tirages
    $bdd->query('DELETE FROM GROUPEA');
    $bdd->query('DELETE FROM GROUPEB');



    //reinitialisation a la table equipe
    $sqlUpdateEquipe = "
    update equipe set matchJouer=0,
    matchGagner=0,matchPerdu=0,
    matchNull=0,butPour=0,butContre=0,
    difference=0,point=0;
    ";
    $bdd->query($sqlUpdateEquipe);

    //reinitialisation a la table match
    $sqlUpdateMatch = " 
    UPDATE matchE SET equipe1=0,
    equipe2=0,
    EGagner=0;
    ";
    $bdd->query($sqlUpdateMatch);



    // ajout des groupes a la base 
    $sqlA = 'INSERT INTO GroupeA(teteDeSerieA1,teteDeSerieA2,teteDeSerieA3,teteDeSerieA4) VALUES(?,?,?,?)';
    $sqlB = 'INSERT INTO GroupeB(teteDeSerieB1,teteDeSerieB2,teteDeSerieB3,teteDeSerieB4) VALUES(?,?,?,?)';

    $bdd->prepare($sqlA)->execute([$teteDeSerieA1, $teteDeSerieA2, $teteDeSerieA3, $teteDeSerieA4]);
    $bdd->prepare($sqlB)->execute([$teteDeSerieB1, $teteDeSerieB2, $teteDeSerieB3, $teteDeSerieB4]);

    header('Location:presentation.php');
}
//Creationn du classement du groupe A
$bdd->query('DELETE FROM ClassementA');
$sqlClA = "INSERT INTO ClassementA SELECT * FROM EQUIPE
WHERE nomEquipe IN('$myResult1->teteDeSerieA1','$myResult1->teteDeSerieA2','$myResult1->teteDeSerieA3','$myResult1->teteDeSerieA4') ORDER BY POINT DESC";
$bdd->query($sqlClA);



// selection a la base pour le classement du groupe A
$resultCA2 = $bdd->query("SELECT * FROM ClassementA LIMIT 2,2")->fetchAll();
$resultCA1 = $bdd->query("SELECT * FROM ClassementA LIMIT 2")->fetchAll();

function verifyMatch($equipe1, $equipe2)
{

    $bdd = loadDb();
    $sqlEG = "SELECT EGagner from matchE where equipe1='$equipe1' AND equipe2='$equipe2'";
    $result = $bdd->query($sqlEG);
    if ($myResult = $result->fetchObject()) { //verification si il y a un match
        return $myResult->EGagner; //retour de l'id de l'equipe gagnante
    }
    return null; //sinon il retourne null
}



// Verification pour les deux premiers du classement (1er et 2eme)
if ($resultCA1[0]['point'] == $resultCA1[1]['point']) {
    $bdd = loadDb();
    $equipeGagner = verifyMatch($resultCA1[0]['id'], $resultCA1[1]['id']);
    if ($equipeGagner == $resultCA1[1]['id']) { //verification si l'equipe gagnante est deuxieme
        $temp = $resultCA1[0];
        $resultCA1[0] = $resultCA1[1];
        $resultCA1[1] = $temp;
    }
    // Verification en cas d'egalite de score
    if ($equipeGagner == 0) {
        if ($resultCA1[1]['butPour'] > $resultCA1[0]['butPour']) { //verification si l'equipe gagnante est deuxieme
            $temp = $resultCA1[0];
            $resultCA1[0] = $resultCA1[1];
            $resultCA1[1] = $temp;
        }

         // Verification si les butPour des deux premiers equipes (1er et 2eme) sont egaux
         if ($resultCA1[1]['butPour'] == $resultCA1[0]['butPour']) {
            if ($resultCA1[1]['butContre'] < $resultCA1[0]['butContre']) { //si c'est le cas on tiendra compte de l'equipe qui aura encaisse le moins de but
                $temp = $resultCA1[0];
                $resultCA1[0] = $resultCA1[1];
                $resultCA1[1] = $temp;
            }
        }
    }
}

//Verification pour les deux derniers du classement (3eme et 4eme)

if ($resultCA2[0]['point'] == $resultCA2[1]['point']) {
    $bdd = loadDb();
    $equipeGagner = verifyMatch($resultCA2[0]['id'], $resultCA2[1]['id']);
    if ($equipeGagner == $resultCA2[1]['id']) { //verification si l'equipe gagnante est quatrieme
        $temp = $resultCA2[0];
        $resultCA2[0] = $resultCA2[1];
        $resultCA2[1] = $temp;
    }

    if ($equipeGagner == 0) {
        if ($resultCA2[1]['butPour'] > $resultCA2[0]['butPour']) { //verification si l'equipe gagnante est quatrieme
            $temp = $resultCA2[0];
            $resultCA2[0] = $resultCA2[1];
            $resultCA2[1] = $temp;
        }
         // Verification si les butPour des deux premiers equipes (1er et 2eme) sont egaux
         if ($resultCA2[1]['butPour'] == $resultCA2[0]['butPour']) {
            if ($resultCA2[1]['butContre'] < $resultCA2[0]['butContre']) { //si c'est le cas on tiendra compte de l'equipe qui aura encaisse le moins de but
                $temp = $resultCA2[0];
                $resultCA2[0] = $resultCA2[1];
                $resultCA2[1] = $temp;
            }
        }
    }
}




//Creation du classement du groupe B
$bdd->query('DELETE FROM ClassementB');
$sqlClB = "INSERT INTO ClassementB SELECT * FROM EQUIPE
WHERE nomEquipe IN('$myResult2->teteDeSerieB1','$myResult2->teteDeSerieB2','$myResult2->teteDeSerieB3','$myResult2->teteDeSerieB4') ORDER BY POINT DESC 
";
$bdd->query($sqlClB);

// selection a la base pour le classement du groupe B
$sqlClassementB = "
SELECT * FROM ClassementB ";
$resultCB = $bdd->query($sqlClassementB);


//selection a la base pour le classement du groupe B
$resultCB2 = $bdd->query("SELECT * FROM ClassementB LIMIT 2,2")->fetchAll();
$resultCB1 = $bdd->query("SELECT * FROM ClassementB LIMIT 2")->fetchAll();



// Verification pour les deux premiers du classement B (1er et 2eme)
if ($resultCB1[0]['point'] == $resultCB1[1]['point']) {
    $bdd = loadDb();
    $equipeGagner = verifyMatch($resultCB1[0]['id'], $resultCB1[1]['id']);
    if ($equipeGagner == $resultCB1[1]['id']) { //verification si l'equipe gagnante est deuxieme
        $temp = $resultCB1[0];
        $resultCB1[0] = $resultCB1[1];
        $resultCB1[1] = $temp;
    }
    // Verification en cas d'egalite de score
    if ($equipeGagner == 0) {
        if ($resultCB1[1]['butPour'] > $resultCB1[0]['butPour']) { //verification si l'equipe gagnante est deuxieme
            $temp = $resultCB1[0];
            $resultCB1[0] = $resultCB1[1];
            $resultCB1[1] = $temp;
        }

        // Verification si les butPour des deux premiers equipes (1er et 2eme) sont egaux
        if ($resultCB1[1]['butPour'] == $resultCB1[0]['butPour']) {
            if ($resultCB1[1]['butContre'] < $resultCB1[0]['butContre']) { //si c'est le cas on tiendra compte de l'equipe qui aura encaisse le moins de but
                $temp = $resultCB1[0];
                $resultCB1[0] = $resultCB1[1];
                $resultCB1[1] = $temp;
            }
        }
    }
}

//Verification pour les deux derniers du classement (3eme et 4eme)

if ($resultCB2[0]['point'] == $resultCB2[1]['point']) {
    $bdd = loadDb();
    $equipeGagner = verifyMatch($resultCB2[0]['id'], $resultCB2[1]['id']);
    if ($equipeGagner == $resultCB2[1]['id']) { //verification si l'equipe gagnante est quatrieme
        $temp = $resultCB2[0];
        $resultCB2[0] = $resultCB2[1];
        $resultCB2[1] = $temp;
    }

    if ($equipeGagner == 0) {
        if ($resultCB2[1]['butPour'] > $resultCB2[0]['butPour']) { //verification si l'equipe gagnante est quatrieme
            $temp = $resultCB2[0];
            $resultCB2[0] = $resultCB2[1];
            $resultCB2[1] = $temp;
        }

        // Verification si les butPour des deux derniers equipes (3eme et 4eme) sont egaux
        if ($resultCB2[1]['butPour'] == $resultCB2[0]['butPour']) {
            if ($resultCB2[1]['butContre'] < $resultCB2[0]['butContre']) { //si c'est le cas on tiendra compte de l'equipe qui aura encaisse le moins de but
                $temp = $resultCB2[0];
                $resultCB2[0] = $resultCB2[1];
                $resultCB2[1] = $temp;
            }
        }
    }
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
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score1" min=0 max=5 class="score" <?php if (isset($_SESSION['match1']) && $_SESSION['match1']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score1'])) echo $_SESSION['score1']; ?>">
                            vs
                            <input type="number" name="score2" min=0 max=5 class="score" <?php if (isset($_SESSION['match1']) && $_SESSION['match1']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score2'])) echo $_SESSION['score2']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match1" <?php if (isset($_SESSION['match1']) && $_SESSION['match1']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 2</td>
                    <td><?= $myResult1->teteDeSerieA3 . ' VS ' . $myResult1->teteDeSerieA4 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score3" min=0 max=5 class="score" <?php if (isset($_SESSION['match2']) && $_SESSION['match2']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score3'])) echo $_SESSION['score3']; ?>">
                            vs
                            <input type="number" name="score4" min=0 max=5 class="score" <?php if (isset($_SESSION['match2']) && $_SESSION['match2']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score4'])) echo $_SESSION['score4']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match2" <?php if (isset($_SESSION['match2']) && $_SESSION['match2']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 3</td>
                    <td><?= $myResult1->teteDeSerieA1 . ' VS ' . $myResult1->teteDeSerieA3 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score5" min=0 max=5 class="score" <?php if (isset($_SESSION['match3']) && $_SESSION['match3']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score5'])) echo $_SESSION['score5']; ?>">
                            vs
                            <input type="number" name="score6" min=0 max=5 class="score" <?php if (isset($_SESSION['match3']) && $_SESSION['match3']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score6'])) echo $_SESSION['score6']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match3" <?php if (isset($_SESSION['match3']) && $_SESSION['match3']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 4</td>
                    <td><?= $myResult1->teteDeSerieA2 . ' VS ' . $myResult1->teteDeSerieA4 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td><input type="number" name="score7" min=0 max=5 class="score" <?php if (isset($_SESSION['match4']) && $_SESSION['match4']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score7'])) echo $_SESSION['score7']; ?>">
                            vs
                            <input type="number" name="score8" min=0 max=5 class="score" <?php if (isset($_SESSION['match4']) && $_SESSION['match4']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score8'])) echo $_SESSION['score8']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match4" <?php if (isset($_SESSION['match4']) && $_SESSION['match4']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 5</td>
                    <td><?= $myResult1->teteDeSerieA1 . ' VS ' . $myResult1->teteDeSerieA4 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score9" min=0 max=5 class="score" <?php if (isset($_SESSION['match5']) && $_SESSION['match5']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score9'])) echo $_SESSION['score9']; ?>">
                            vs
                            <input type="number" name="score10" min=0 max=5 class="score" <?php if (isset($_SESSION['match5']) && $_SESSION['match5']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score10'])) echo $_SESSION['score10']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match5" <?php if (isset($_SESSION['match5']) && $_SESSION['match5']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 6</td>
                    <td><?= $myResult1->teteDeSerieA2 . ' VS ' . $myResult1->teteDeSerieA3 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score11" min=0 max=5 class="score" <?php if (isset($_SESSION['match6']) && $_SESSION['match6']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score11'])) echo $_SESSION['score11']; ?>">
                            vs
                            <input type="number" name="score12" min=0 max=5 class="score" <?php if (isset($_SESSION['match6']) && $_SESSION['match6']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score12'])) echo $_SESSION['score12']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match6" <?php if (isset($_SESSION['match6']) && $_SESSION['match6']) echo 'disabled'; ?>>Jouer</button></td>
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
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score13" min=0 max=5 class="score" <?php if (isset($_SESSION['match7']) && $_SESSION['match7']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score13'])) echo $_SESSION['score13']; ?>">
                            vs
                            <input type="number" name="score14" min=0 max=5 class="score" <?php if (isset($_SESSION['match7']) && $_SESSION['match7']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score14'])) echo $_SESSION['score14']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match7" <?php if (isset($_SESSION['match7']) && $_SESSION['match7']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 8</td>
                    <td><?= $myResult2->teteDeSerieB3 . ' VS ' . $myResult2->teteDeSerieB4 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score15" min=0 max=5 class="score" <?php if (isset($_SESSION['match8']) && $_SESSION['match8']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score15'])) echo $_SESSION['score15']; ?>">
                            vs
                            <input type="number" name="score16" min=0 max=5 class="score" <?php if (isset($_SESSION['match8']) && $_SESSION['match8']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score16'])) echo $_SESSION['score16']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match8" <?php if (isset($_SESSION['match8']) && $_SESSION['match8']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 9</td>
                    <td><?= $myResult2->teteDeSerieB1 . ' VS ' . $myResult2->teteDeSerieB3 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score17" min=0 max=5 class="score" <?php if (isset($_SESSION['match9']) && $_SESSION['match9']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score17'])) echo $_SESSION['score17']; ?>">
                            vs
                            <input type="number" name="score18" min=0 max=5 class="score" <?php if (isset($_SESSION['match9']) && $_SESSION['match9']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score18'])) echo $_SESSION['score18']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match9" <?php if (isset($_SESSION['match9']) && $_SESSION['match9']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 10</td>
                    <td><?= $myResult2->teteDeSerieB2 . ' VS ' . $myResult2->teteDeSerieB4 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score19" min=0 max=5 class="score" <?php if (isset($_SESSION['match10']) && $_SESSION['match10']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score19'])) echo $_SESSION['score19']; ?>">
                            vs
                            <input type="number" name="score20" min=0 max=5 class="score" <?php if (isset($_SESSION['match10']) && $_SESSION['match10']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score20'])) echo $_SESSION['score20']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match10" <?php if (isset($_SESSION['match10']) && $_SESSION['match10']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 11</td>
                    <td><?= $myResult2->teteDeSerieB1 . ' VS ' . $myResult2->teteDeSerieB4 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score21" min=0 max=5 class="score" <?php if (isset($_SESSION['match11']) && $_SESSION['match11']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score21'])) echo $_SESSION['score21']; ?>">
                            vs
                            <input type="number" name="score22" min=0 max=5 class="score" <?php if (isset($_SESSION['match11']) && $_SESSION['match11']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score22'])) echo $_SESSION['score22']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match11" <?php if (isset($_SESSION['match11']) && $_SESSION['match11']) echo 'disabled'; ?>>Jouer</button></td>
                    </form>
                </tr>

                <tr>
                    <td>Match 12</td>
                    <td><?= $myResult2->teteDeSerieB2 . ' VS ' . $myResult2->teteDeSerieB3 ?></td>
                    <form action="../Controleur/traitementMatch.php" method="post">
                        <td>
                            <input type="number" name="score23" min=0 max=5 class="score" <?php if (isset($_SESSION['match12']) && $_SESSION['match12']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score23'])) echo $_SESSION['score23']; ?>">
                            vs <input type="number" name="score24" min=0 max=5 class="score" <?php if (isset($_SESSION['match12']) && $_SESSION['match12']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score24'])) echo $_SESSION['score24']; ?>">
                        </td>
                        <td><button type="submit" name="match" value="match12" <?php if (isset($_SESSION['match12']) && $_SESSION['match12']) echo 'disabled'; ?>>Jouer</button></td>
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

                <?php for ($i = 0; $i < 2; $i++) : ?>
                    <tr>
                        <td><?= $resultCA1[$i]['nomEquipe'] ?>
                        <td><?= $resultCA1[$i]['matchJouer'] ?>
                        <td><?= $resultCA1[$i]['matchGagner'] ?>
                        <td><?= $resultCA1[$i]['matchNull'] ?>
                        <td><?= $resultCA1[$i]['matchPerdu'] ?>
                        <td><?= $resultCA1[$i]['butPour'] ?>
                        <td><?= $resultCA1[$i]['butContre'] ?>
                        <td><?= $resultCA1[$i]['difference'] ?>
                        <td><?= $resultCA1[$i]['point'] ?>
                        <td>
                    </tr>

                <?php endfor; ?>



                <?php for ($i = 0; $i < 2; $i++) : ?>
                    <tr>
                        <td><?= $resultCA2[$i]['nomEquipe'] ?>
                        <td><?= $resultCA2[$i]['matchJouer'] ?>
                        <td><?= $resultCA2[$i]['matchGagner'] ?>
                        <td><?= $resultCA2[$i]['matchNull'] ?>
                        <td><?= $resultCA2[$i]['matchPerdu'] ?>
                        <td><?= $resultCA2[$i]['butPour'] ?>
                        <td><?= $resultCA2[$i]['butContre'] ?>
                        <td><?= $resultCA2[$i]['difference'] ?>
                        <td><?= $resultCA2[$i]['point'] ?>
                        <td>
                    </tr>
                <?php endfor; ?>
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
                        <td>MP</td>
                        <td>BP</td>
                        <td>BC</td>
                        <td>Dif</td>
                        <td>Point</td>
                    </tr>

                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <tr>
                            <td><?= $resultCB1[$i]['nomEquipe'] ?>
                            <td><?= $resultCB1[$i]['matchJouer'] ?>
                            <td><?= $resultCB1[$i]['matchGagner'] ?>
                            <td><?= $resultCB1[$i]['matchNull'] ?>
                            <td><?= $resultCB1[$i]['matchPerdu'] ?>
                            <td><?= $resultCB1[$i]['butPour'] ?>
                            <td><?= $resultCB1[$i]['butContre'] ?>
                            <td><?= $resultCB1[$i]['difference'] ?>
                            <td><?= $resultCB1[$i]['point'] ?>
                            <td>
                        </tr>

                    <?php endfor; ?>

                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <tr>
                            <td><?= $resultCB2[$i]['nomEquipe'] ?>
                            <td><?= $resultCB2[$i]['matchJouer'] ?>
                            <td><?= $resultCB2[$i]['matchGagner'] ?>
                            <td><?= $resultCB2[$i]['matchNull'] ?>
                            <td><?= $resultCB2[$i]['matchPerdu'] ?>
                            <td><?= $resultCB2[$i]['butPour'] ?>
                            <td><?= $resultCB2[$i]['butContre'] ?>
                            <td><?= $resultCB2[$i]['difference'] ?>
                            <td><?= $resultCB2[$i]['point'] ?>
                            <td>
                        </tr>
                    <?php endfor; ?>


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
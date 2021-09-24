<?php
    require './main.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./presentation.css">
    <title>Vue</title>
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

            <button type="submit" class="btn_tirage" name="tirage">Tirage</button>
        </form>

    </section>
    <section class="<?= isset($_GET['tirage'])?'display_validation':'content'?>">
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
                    <td>MP</td>
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

                    <p><?= isset($_SESSION['equipeGagnante']) ? $_SESSION['equipeGagnante'] : '' ?></p>
                    <tr>
                        <td>Match 13</td>
                        <td><?= $resultCA1[0]['nomEquipe'] . ' VS ' . $resultCB1[1]['nomEquipe'] ?></td>
                        <form action="
                                <?=
                                '../Controleur/traitementMatch.php?equipe1=' . $resultCA1[0]['nomEquipe'] . '&equipe2=' . $resultCB1[1]['nomEquipe']
                                ?>
                                " method="post">
                            <td>
                                <input type="number" name="score25" min=0 max=5 class="score" <?php if (isset($_SESSION['match13']) && $_SESSION['match13']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score25'])) echo $_SESSION['score25']; ?>">
                                vs <input type="number" name="score26" min=0 max=5 class="score" <?php if (isset($_SESSION['match13']) && $_SESSION['match13']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score26'])) echo $_SESSION['score26']; ?>">
                            </td>
                            <td><button type="submit" name="match" value="match13" <?php if (isset($_SESSION['match13']) && $_SESSION['match13']) echo 'disabled'; ?>>Jouer</button></td>
                        </form>
                    </tr>

                    <tr>
                        <td>Match 14</td>
                        <td><?= $resultCB1[0]['nomEquipe'] . ' VS ' . $resultCA1[1]['nomEquipe'] ?></td>
                        <form action="
                                <?=
                                '../Controleur/traitementMatch.php?equipe1=' . $resultCB1[0]['nomEquipe'] . '&equipe2=' . $resultCA1[1]['nomEquipe']
                                ?>
                                " method="post">
                            <td>
                                <input type="number" name="score27" min=0 max=5 class="score" <?php if (isset($_SESSION['match14']) && $_SESSION['match14']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score27'])) echo $_SESSION['score27']; ?>">
                                vs <input type="number" name="score28" min=0 max=5 class="score" <?php if (isset($_SESSION['match14']) && $_SESSION['match14']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score28'])) echo $_SESSION['score28']; ?>">
                            </td>
                            <td><button type="submit" name="match" value="match14" <?php if (isset($_SESSION['match14']) && $_SESSION['match14']) echo 'disabled'; ?>>Jouer</button></td>
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

                        <td>Match15</td>
                        <td><?= isset($resultDemi->equipePerdante) ? $resultDemi->equipePerdante : '---' ?> VS <?= isset($resultDemi1->equipePerdante) ? $resultDemi1->equipePerdante : '---' ?></td>
                        <form action="../Controleur/traitementMatch.php" method="post">
                            <td>
                                <input type="number" name="score29" min=0 max=5 class="score" <?php if (isset($_SESSION['match15']) && $_SESSION['match15']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score29'])) echo $_SESSION['score29']; ?>">
                                vs <input type="number" name="score30" min=0 max=5 class="score" <?php if (isset($_SESSION['match15']) && $_SESSION['match15']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score30'])) echo $_SESSION['score30']; ?>">
                            </td>
                            <td><button type="submit" name="match" value="match15" <?php if (isset($_SESSION['match15']) && $_SESSION['match15']) echo 'disabled'; ?>>Jouer</button></td>
                        </form>
                    </tr>
                    <p>Gagnant : <?= isset($resultDemi2->equipeGagnante) ? $resultDemi2->equipeGagnante : '---' ?></p>
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
                        <td><?= isset($resultDemi->equipeGagnante) ? $resultDemi->equipeGagnante : '---' ?> VS <?= isset($resultDemi1->equipeGagnante) ? $resultDemi1->equipeGagnante : '---' ?></td>
                        <form action="../Controleur/traitementMatch.php" method="post">
                            <td>
                                <input type="number" name="score31" min=0 max=5 class="score" <?php if (isset($_SESSION['match16']) && $_SESSION['match16']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score31'])) echo $_SESSION['score31']; ?>">
                                vs <input type="number" name="score32" min=0 max=5 class="score" <?php if (isset($_SESSION['match16']) && $_SESSION['match16']) echo 'disabled'; ?> value="<?php if (isset($_SESSION['score32'])) echo $_SESSION['score32']; ?>">
                            </td>
                            <td><button type="submit" name="match" value="match16" <?php if (isset($_SESSION['match16']) && $_SESSION['match16']) echo 'disabled'; ?>>Jouer</button></td>
                        </form>
                    </tr>
                    <p>Gagnant : <?= isset($resultDemi3->equipeGagnante) ? $resultDemi3->equipeGagnante : '---' ?></p>
                </table>
        </section>

    </section>
    <script src="../js/script.js"></script>
</body>

</html>
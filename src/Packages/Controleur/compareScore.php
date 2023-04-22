<?php
// function qui permet la gestion des equipe a la base de donnee
function compareScore($nomEquipe1, $nomEquipe2, $score1, $score2, $match)
{
    $bdd = loadDb();
    $resultE1 = $bdd->query("SELECT * FROM EQUIPE WHERE nomEquipe='$nomEquipe1'");
    $myResultE1 = $resultE1->fetch(PDO::FETCH_OBJ); //ajout des donnees dans la variable


    $resultE2 = $bdd->query("SELECT * FROM EQUIPE WHERE nomEquipe='$nomEquipe2'");
    $myResultE2 = $resultE2->fetch(PDO::FETCH_OBJ);

    if ($score1 > $score2) {
        $sql1 = "
        UPDATE EQUIPE SET matchJouer=$myResultE1->matchJouer+1,
        matchGagner=$myResultE1->matchGagner+1,
        butPour=$myResultE1->butPour+$score1,
        point=$myResultE1->point+3,
        butContre=$myResultE1->butContre+$score2,
        difference=$myResultE1->difference+($score1-$score2)
        WHERE nomEquipe='$nomEquipe1'";

        $bdd->query($sql1);

        $sql2 = "UPDATE EQUIPE SET matchJouer=$myResultE2->matchJouer+1,
        matchPerdu=$myResultE2->matchPerdu+1,
        butPour=$myResultE2->butPour+$score2,
        butContre=$myResultE2->butContre+$score1,
        difference=$myResultE2->difference+($score2-$score1)
        WHERE nomEquipe='$nomEquipe2'";

        $bdd->query($sql2);

        addMatch($myResultE1->id, $myResultE2->id, $myResultE1->id, $match);
    } elseif ($score2 > $score1) {

        $sql1 = "
        UPDATE EQUIPE SET matchJouer=$myResultE2->matchJouer+1,
        matchGagner=$myResultE2->matchGagner+1,
        butPour=$myResultE2->butPour+$score2,
        point=$myResultE2->point+3,
        butContre=$myResultE2->butContre+$score1,
        difference=$myResultE2->difference+($score2-$score1)
        WHERE nomEquipe='$nomEquipe2'";

        $bdd->query($sql1);

        $sql2 = "UPDATE EQUIPE SET matchJouer=$myResultE1->matchJouer+1,
        matchPerdu=$myResultE1->matchPerdu+1,
        butPour=$myResultE1->butPour+$score1,
        butContre=$myResultE1->butContre+$score2,
        difference=$myResultE1->difference+($score1-$score2)
        WHERE nomEquipe='$nomEquipe1'";

        $bdd->query($sql2);
        addMatch($myResultE1->id, $myResultE2->id, $myResultE2->id, $match);
    } else {

        $sql1 = "
        UPDATE EQUIPE SET matchJouer=$myResultE2->matchJouer+1,
        matchNull=$myResultE2->matchNull+1,
        butPour=$myResultE2->butPour+$score2,
        point=$myResultE2->point+1,
        butContre=$myResultE2->butContre+$score1
        WHERE nomEquipe='$nomEquipe2'";

        $bdd->query($sql1);

        $sql2 =  "
        UPDATE EQUIPE SET matchJouer=$myResultE1->matchJouer+1,
        matchNull=$myResultE1->matchNull+1,
        butPour=$myResultE1->butPour+$score1,
        point=$myResultE1->point+1,
        butContre=$myResultE1->butContre+$score2
        WHERE nomEquipe='$nomEquipe1'";

        $bdd->query($sql2);
        addMatch($myResultE1->id, $myResultE2->id, 0, $match);
    }
}
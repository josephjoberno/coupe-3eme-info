<!-- Le controleur contient la logique concernant les actions a effectuer par l'utilisateur -->
<?php
session_start();

require '../../log.php';
require '../../connectionDatabase.php';




$bdd = loadDb();

//selection a la base pour le groupe A

$sqlQ1 = 'SELECT * FROM GroupeA WHERE id=(SELECT max(id) FROM GroupeA)';
$result1 = $bdd->query($sqlQ1);
$myResult1 = $result1->fetch(PDO::FETCH_OBJ);

//selection a la base pour le groupe B
$sqlQ2 = 'SELECT * FROM GroupeB WHERE id=(SELECT max(id) FROM GroupeB)';
$result2 = $bdd->query($sqlQ2);
$myResult2 = $result2->fetch(PDO::FETCH_OBJ);



if (isset($_POST)) {

    echo 'test';


    switch ($_POST['match']) {

            // Groupe A
        case 'match1':
            $_SESSION['match1'] = true;
            $_SESSION['score1'] = $_POST['score1'];
            $_SESSION['score2'] = $_POST['score2'];
            compareScore($myResult1->teteDeSerieA1, $myResult1->teteDeSerieA2, $_SESSION['score1'],  $_SESSION['score2'], 'match1');
            header('Location:../Vue/presentation.php');
            break;

        case 'match2':
            $_SESSION['match2'] = true;
            $_SESSION['score3'] = $_POST['score3'];
            $_SESSION['score4'] = $_POST['score4'];
            compareScore($myResult1->teteDeSerieA3, $myResult1->teteDeSerieA4, $_SESSION['score3'],  $_SESSION['score4'], 'match2');
            header('Location:../Vue/presentation.php');
            break;
        case 'match3':
            $_SESSION['match3'] = true;
            $_SESSION['score5'] = $_POST['score5'];
            $_SESSION['score6'] = $_POST['score6'];
            compareScore($myResult1->teteDeSerieA1, $myResult1->teteDeSerieA3, $_SESSION['score5'],  $_SESSION['score6'], 'match3');
            header('Location:../Vue/presentation.php');
            break;

        case 'match4':
            $_SESSION['match4'] = true;
            $_SESSION['score7'] = $_POST['score7'];
            $_SESSION['score8'] = $_POST['score8'];
            compareScore($myResult1->teteDeSerieA2, $myResult1->teteDeSerieA4, $_SESSION['score7'],  $_SESSION['score8'], 'match4');
            header('Location:../Vue/presentation.php');
            break;

        case 'match5':
            $_SESSION['match5'] = true;
            $_SESSION['score9'] = $_POST['score9'];
            $_SESSION['score10'] = $_POST['score10'];
            compareScore($myResult1->teteDeSerieA1, $myResult1->teteDeSerieA4, $_SESSION['score9'],  $_SESSION['score10'], 'match5');
            header('Location:../Vue/presentation.php');
            break;

        case 'match6':
            $_SESSION['match6'] = true;
            $_SESSION['score11'] = $_POST['score11'];
            $_SESSION['score12'] = $_POST['score12'];
            compareScore($myResult1->teteDeSerieA2, $myResult1->teteDeSerieA3, $_SESSION['score11'],  $_SESSION['score12'], 'match6');
            header('Location:../Vue/presentation.php');
            break;

            // Groupe B

        case 'match7':
            $_SESSION['match7'] = true;
            $_SESSION['score13'] = $_POST['score13'];
            $_SESSION['score14'] = $_POST['score14'];
            compareScore($myResult2->teteDeSerieB1, $myResult2->teteDeSerieB2, $_SESSION['score13'],  $_SESSION['score14'], 'match7');
            header('Location:../Vue/presentation.php');
            break;

        case 'match8':
            $_SESSION['match8'] = true;
            $_SESSION['score15'] = $_POST['score15'];
            $_SESSION['score16'] = $_POST['score16'];
            compareScore($myResult2->teteDeSerieB3, $myResult2->teteDeSerieB4, $_SESSION['score15'],  $_SESSION['score16'], 'match8');
            header('Location:../Vue/presentation.php');
            break;

        case 'match9':
            $_SESSION['match9'] = true;
            $_SESSION['score17'] = $_POST['score17'];
            $_SESSION['score18'] = $_POST['score18'];
            compareScore($myResult2->teteDeSerieB1, $myResult2->teteDeSerieB3, $_SESSION['score17'],  $_SESSION['score18'], 'macth9');
            header('Location:../Vue/presentation.php');
            break;

        case 'match10':
            $_SESSION['match10'] = true;
            $_SESSION['score19'] = $_POST['score19'];
            $_SESSION['score20'] = $_POST['score20'];
            compareScore($myResult2->teteDeSerieB2, $myResult2->teteDeSerieB4, $_SESSION['score19'],  $_SESSION['score20'], 'match10');
            header('Location:../Vue/presentation.php');
            break;

        case 'match11':
            $_SESSION['match11'] = true;
            $_SESSION['score21'] = $_POST['score21'];
            $_SESSION['score22'] = $_POST['score22'];
            compareScore($myResult2->teteDeSerieB1, $myResult2->teteDeSerieB4, $_SESSION['score21'],  $_SESSION['score22'], 'match11');
            header('Location:../Vue/presentation.php');
            break;

        case 'match12':
            $_SESSION['match12'] = true;
            $_SESSION['score23'] = $_POST['score23'];
            $_SESSION['score24'] = $_POST['score24'];
            compareScore($myResult2->teteDeSerieB2, $myResult2->teteDeSerieB3, $_SESSION['score23'],  $_SESSION['score24'], 'match12');
            header('Location:../Vue/presentation.php');
            break;
    }
}

function addMatch($equipe1, $equipe2, $EGagner, $match)
{
    $bdd = loadDb();
    $sqlM = " UPDATE matchE SET equipe1=$equipe1,equipe2=$equipe2,EGagner=$EGagner WHERE matchEQ='$match'";
    $bdd->query($sqlM);
}

// function qui permet la gestion des equipe a la base de donnee
function compareScore($nomEquipe1, $nomEquipe2, $score1, $score2, $match)
{
    $bdd = loadDb();
    $resultE1 = $bdd->query("SELECT * FROM EQUIPE WHERE nomEquipe='$nomEquipe1'");
    $myResultE1 = $resultE1->fetch(PDO::FETCH_OBJ);//ajout des donnees dans la variable


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

?>
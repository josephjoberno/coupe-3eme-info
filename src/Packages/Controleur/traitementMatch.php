
<!-- Le controleur contient la logique concernant les actions a effectuer par l'utilisateur -->
<?php
session_start();

require_once '../Vue/connect.php';
require '../Controleur/compareScore.php';
require '../Controleur/compareScorev2.php';
require '../Controleur/log.php';


if (isset($_GET['equipe1']) && isset($_GET['equipe2'])) {
    $equipeDemi1 = htmlspecialchars(strip_tags($_GET['equipe1']));
    $equipeDemi2 = htmlspecialchars(strip_tags($_GET['equipe2']));
}



$bdd = loadDb();

//selection sur la base pour le groupe A

$sqlQ1 = 'SELECT * FROM GroupeA WHERE id=(SELECT max(id) FROM GroupeA)';
$result1 = $bdd->query($sqlQ1);
$myResult1 = $result1->fetch(PDO::FETCH_OBJ);

//selection sur la base pour le groupe B
$sqlQ2 = 'SELECT * FROM GroupeB WHERE id=(SELECT max(id) FROM GroupeB)';
$result2 = $bdd->query($sqlQ2);
$myResult2 = $result2->fetch(PDO::FETCH_OBJ);


// Affichage de l'equipe gagnante et de l'equipe perdante du match 13
$resultD = $bdd->query("SELECT equipeGagnante,equipePerdante From gestionFinal WHERE typeMatch='DemiFinal' and matchF='match13'");
if ($resultDemi = $resultD->fetchObject())  echo ''; //creation de la variable resultDemi si la requete est true(il existe une equipeGagnante)

// Affichage de l'equipe gagnante et de l'equipe perdante du match 14
$resultD1 = $bdd->query("SELECT equipeGagnante,equipePerdante From gestionFinal WHERE typeMatch='DemiFinal' and matchF='match14'");
if ($resultDemi1 = $resultD1->fetchObject()) echo ''; //creation de la variable resultDemi si la requete est true(il existe une equipeGagnante)

var_log($resultDemi->equipeGagnante);

if (isset($_POST)) {


    switch ($_POST['match']) {

            // Groupe A
        case 'match1':
            $_SESSION['match1'] = true;
            $_SESSION['score1'] = $_POST['score1'];
            $_SESSION['score2'] = $_POST['score2'];
            compareScore($myResult1->teteDeSerieA1, $myResult1->teteDeSerieA2, $_SESSION['score1'],  $_SESSION['score2'], 'match1');
            header('Location:../Vue/matchgroupe.php');
            break;

        case 'match2':
            $_SESSION['match2'] = true;
            $_SESSION['score3'] = $_POST['score3'];
            $_SESSION['score4'] = $_POST['score4'];
            compareScore($myResult1->teteDeSerieA3, $myResult1->teteDeSerieA4, $_SESSION['score3'],  $_SESSION['score4'], 'match2');
            header('Location:../Vue/matchgroupe.php');
            break;
        case 'match3':
            $_SESSION['match3'] = true;
            $_SESSION['score5'] = $_POST['score5'];
            $_SESSION['score6'] = $_POST['score6'];
            compareScore($myResult1->teteDeSerieA1, $myResult1->teteDeSerieA3, $_SESSION['score5'],  $_SESSION['score6'], 'match3');
            header('Location:../Vue/matchgroupe.php');
            break;

        case 'match4':
            $_SESSION['match4'] = true;
            $_SESSION['score7'] = $_POST['score7'];
            $_SESSION['score8'] = $_POST['score8'];
            compareScore($myResult1->teteDeSerieA2, $myResult1->teteDeSerieA4, $_SESSION['score7'],  $_SESSION['score8'], 'match4');
            header('Location:../Vue/matchgroupe.php');
            break;
         
        case 'match5':
            $_SESSION['match5'] = true;
            $_SESSION['score9'] = $_POST['score9'];
            $_SESSION['score10'] = $_POST['score10'];
            compareScore($myResult1->teteDeSerieA1, $myResult1->teteDeSerieA4, $_SESSION['score9'],  $_SESSION['score10'], 'match5');
            header('Location:../Vue/matchgroupe.php');
            break;

        case 'match6':
            $_SESSION['match6'] = true;
            $_SESSION['score11'] = $_POST['score11'];
            $_SESSION['score12'] = $_POST['score12'];
            compareScore($myResult1->teteDeSerieA2, $myResult1->teteDeSerieA3, $_SESSION['score11'],  $_SESSION['score12'], 'match6');
            header('Location:../Vue/matchgroupe.php');
            break;

            // Groupe B

        case 'match7':
            $_SESSION['match7'] = true;
            $_SESSION['score13'] = $_POST['score13'];
            $_SESSION['score14'] = $_POST['score14'];
            compareScore($myResult2->teteDeSerieB1, $myResult2->teteDeSerieB2, $_SESSION['score13'],  $_SESSION['score14'], 'match7');
            header('Location:../Vue/matchgroupe.php');
            break;

        case 'match8':
            $_SESSION['match8'] = true;
            $_SESSION['score15'] = $_POST['score15'];
            $_SESSION['score16'] = $_POST['score16'];
            compareScore($myResult2->teteDeSerieB3, $myResult2->teteDeSerieB4, $_SESSION['score15'],  $_SESSION['score16'], 'match8');
            header('Location:../Vue/matchgroupe.php');
            break;

        case 'match9':
            $_SESSION['match9'] = true;
            $_SESSION['score17'] = $_POST['score17'];
            $_SESSION['score18'] = $_POST['score18'];
            compareScore($myResult2->teteDeSerieB1, $myResult2->teteDeSerieB3, $_SESSION['score17'],  $_SESSION['score18'], 'macth9');
            header('Location:../Vue/matchgroupe.php');
            break;
        case 'match10':
            $_SESSION['match10'] = true;
            $_SESSION['score19'] = $_POST['score19'];
            $_SESSION['score20'] = $_POST['score20'];
            compareScore($myResult2->teteDeSerieB2, $myResult2->teteDeSerieB4, $_SESSION['score19'],  $_SESSION['score20'], 'match10');
            header('Location:../Vue/matchgroupe.php');
            break;

        case 'match11':
            $_SESSION['match11'] = true;
            $_SESSION['score21'] = $_POST['score21'];
            $_SESSION['score22'] = $_POST['score22'];
            compareScore($myResult2->teteDeSerieB1, $myResult2->teteDeSerieB4, $_SESSION['score21'],  $_SESSION['score22'], 'match11');
            header('Location:../Vue/matchgroupe.php');
            break;

        case 'match12':
            $_SESSION['match12'] = true;
            $_SESSION['score23'] = $_POST['score23'];
            $_SESSION['score24'] = $_POST['score24'];
            compareScore($myResult2->teteDeSerieB2, $myResult2->teteDeSerieB3, $_SESSION['score23'],  $_SESSION['score24'], 'match12');
            header('Location:../Vue/matchgroupe.php');
            break;

        case 'match13':
            $_SESSION['match13'] = true;
            $_SESSION['score25'] = $_POST['score25'];
            $_SESSION['score26'] = $_POST['score26'];
            compareScorev2($equipeDemi1, $equipeDemi2, $_SESSION['score25'],  $_SESSION['score26'], 'match13', 'DemiFinal');
            updateScore($resultDemi1->equipeGagnante, $resultDemi1->equipe, $_SESSION['score25'], $_SESSION['score26']);
           
            break;

        case 'match14':
            $_SESSION['match14'] = true;
            $_SESSION['score27'] = $_POST['score27'];
            $_SESSION['score28'] = $_POST['score28'];
            compareScorev2($equipeDemi1, $equipeDemi2, $_SESSION['score27'],  $_SESSION['score28'], 'match14', 'DemiFinal');
            updateScore($equipeDemi1, $equipeDemi2, $_SESSION['score27'], $_SESSION['score28']);
            break;

        case 'match15':
            $_SESSION['match15'] = true;
            $_SESSION['score29'] = $_POST['score29'];
            $_SESSION['score30'] = $_POST['score30'];
            compareScorev2($resultDemi->equipePerdante, $resultDemi1->equipePerdante, $_SESSION['score29'],  $_SESSION['score30'], 'match15', 'PetiteFinale');
            updateScore($resultDemi->equipePerdante, $resultDemi1->equipePerdante, $_SESSION['score29'], $_SESSION['score30']);
            break;

        case 'match16':
            $_SESSION['match16'] = true;
            $_SESSION['score31'] = $_POST['score31'];
            $_SESSION['score32'] = $_POST['score32'];
            compareScorev2($resultDemi->equipeGagnante, $resultDemi1->equipeGagnante, $_SESSION['score31'],  $_SESSION['score32'], 'match16', 'GrandeFinale');
            updateScore($resultDemi->equipeGagnante, $resultDemi1->equipeGagnante, $_SESSION['score31'], $_SESSION['score32']);
            break;
    }
}

function addMatch($equipe1, $equipe2, $EGagner, $match)
{
    $bdd = loadDb();
    $sqlM = " UPDATE matchE SET equipe1=$equipe1,equipe2=$equipe2,EGagner=$EGagner WHERE matchEQ='$match'";
    $bdd->query($sqlM);
}

// Mise a jour des donnees de la table classementFinal
$bdd->query('DELETE FROM classementFinal');
$update = "INSERT INTO classementFinal SELECT * FROM equipe";
$execUpdate = $bdd->query($update);

function updateScore($nomEq1,$nomEq2,$score1,$score2){

    $bdd=loadDb();
    $select1 =$bdd->query("SELECT * FROM classementFinal WHERE nomEquipe='$nomEq1'");
    $result1 =$select1->fetch(PDO::FETCH_OBJ);

    $select2 =$bdd->query("SELECT * FROM classementFinal WHERE nomEquipe='$nomEq2'");
    $result2 =$select2->fetch(PDO::FETCH_OBJ);

    if($score1 > $score2){
        $update ="UPDATE classementFinal set 
        matchJouer=$result1->matchJouer+1,
        matchGagner=$result1->matchGagner+1,
        butPour=$result1->butPour+$score1,
        butContre=$result1->butContre+$score2,
        difference=$result1->difference+($score1-$score2),
        point=$result1->point+3
        WHERE nomEquipe='$nomEq1'";

        $bdd->query($update);

        $update2 ="UPDATE classementFinal set 
        matchJouer=$result2->matchJouer+1,
        matchPerdu=$result2->matchPerdu+1,
        butPour=$result2->butPour+$score2,
        butContre=$result2->butContre+$score1,
        difference=$result2->difference+($score2-$score1)
        WHERE nomEquipe='$nomEq2'";


        $bdd->query($update2);

    }

    if($score2 > $score1){
        $update ="UPDATE classementFinal set 
        matchJouer=$result2->matchJouer+1,
        matchGagner=$result2->matchGagner+1,
        butPour=$result2->butPour+$score2,
        butContre=$result2->butContre+$score1,
        difference=$result2->difference+($score2-$score1),
        point=$result2->point+3
        WHERE nomEquipe='$nomEq2'";

        $bdd->query($update2);

        $update2 ="UPDATE classementFinal set 
        matchJouer=$result1->matchJouer+1,
        matchPerdu=$result1->matchPerdu+1,
        butPour=$result1->butPour+$score1,
        butContre=$result1->butContre+$score2,
        difference=$result1->difference+($score1-$score2)
        WHERE nomEquipe='$nomEq1'";


        $bdd->query($update);

    }

}



?>
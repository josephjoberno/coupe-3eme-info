<?php
function compareScorev2($equipe1, $equipe2, $score1, $score2, $match, $typeMatch)
{
    $bdd = loadDb();
    $result1 =  $bdd->query("SELECT id From Equipe WHERE nomEquipe='$equipe1'");
    $idEquipe1 = $result1->fetchObject();
    $result2 =  $bdd->query("SELECT id From Equipe WHERE nomEquipe='$equipe2'");
    $idEquipe2 = $result2->fetchObject();

    if ($score1 > $score2) {

        $sqlUpdateFinal = "
        INSERT INTO gestionFinal(equipeGagnante,equipePerdante,typeMatch,matchF) VALUES('$equipe1','$equipe2','$typeMatch','$match');
        ";
        
        $bdd->query($sqlUpdateFinal);
        addMatch(intval($idEquipe1->id), intval($idEquipe2->id), intval($idEquipe1->id), $match);
        $_SESSION['prolongation'] = false;
        if ($match == 'match13'){
            header('Location:../Vue/demifinal.php');
        }

        if ($match == 'match14'){
            header('Location:../Vue/demifinal.php');
        }
        if ($match == 'match15'){
            header('Location:../Vue/petitefinale.php');
        }
        if ($match == 'match16'){
            header('Location:../Vue/finale.php');
        }    
    } else if ($score2 > $score1) {
        $sqlUpdateFinal = "
        INSERT INTO gestionFinal(equipeGagnante,equipePerdante,typeMatch,matchF) VALUES('$equipe2','$equipe1','$typeMatch','$match');
        ";
        $bdd->query($sqlUpdateFinal);
        addMatch(intval($idEquipe1->id), intval($idEquipe2->id), intval($idEquipe2->id), $match);
        $_SESSION['prolongation'] = false;
   
        if ($match == 'match13'){
            header('Location:../Vue/demifinal.php');
        }

        if ($match == 'match14'){
            header('Location:../Vue/demifinal.php');
        }
        if ($match == 'match15'){
            header('Location:../Vue/petitefinale.php');
        }
        if ($match == 'match16'){
            header('Location:../Vue/finale.php');
        }    
    }   
        else {
        $_SESSION['prolongation'] = true;
        if ($match == 'match13'){
            $_SESSION['match13'] = false;
            header('Location:../Vue/demifinal.php');
        }

        if ($match == 'match14'){
            $_SESSION['match14'] = false;
            header('Location:../Vue/demifinal.php');
        }
        if ($match == 'match15'){
            $_SESSION['match15'] = false;
            header('Location:../Vue/petitefinale.php');
        }
        if ($match == 'match16'){
            $_SESSION['match16'] = false;
            header('Location:../Vue/finale.php');
        }
    }
}

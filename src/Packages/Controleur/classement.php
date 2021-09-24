<?php
require_once '../../connectionDatabase.php';

$bdd=loadDb();

//selection a la base pour le groupe A
$sqlQ1 = 'SELECT * FROM GroupeA WHERE id=(SELECT max(id) FROM GroupeA)';
$result1 = $bdd->query($sqlQ1);
$myResult1 = $result1->fetch(PDO::FETCH_OBJ);

//selection a la base pour le groupe B
$sqlQ2 = 'SELECT * FROM GroupeB WHERE id=(SELECT max(id) FROM GroupeB)';
$result2 = $bdd->query($sqlQ2);
$myResult2 = $result2->fetch(PDO::FETCH_OBJ);

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

//Creationn du classement du groupe A
$bdd->query('DELETE FROM ClassementA');
$sqlClA = "INSERT INTO ClassementA SELECT * FROM EQUIPE
WHERE nomEquipe IN('$myResult1->teteDeSerieA1','$myResult1->teteDeSerieA2','$myResult1->teteDeSerieA3','$myResult1->teteDeSerieA4') ORDER BY POINT DESC";
$bdd->query($sqlClA);



// selection a la base pour le classement du groupe A
$resultCA2 = $bdd->query("SELECT * FROM ClassementA LIMIT 2,2")->fetchAll();
$resultCA1 = $bdd->query("SELECT * FROM ClassementA LIMIT 2")->fetchAll();

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

    if ($equipeGagner == 0) { //verification pour les matchs nul en cas de confrontation direct
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

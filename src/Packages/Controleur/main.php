<?php
session_start();
//creation des sessions pour les matchs


// require section
require_once '../Vue/connect.php';
require '../Controleur/classement.php';
require '../Controleur/tirageAleatoire.php';//tirage aleatoire
require '../Controleur/gestionUtilisateur.php';


// variable de connection a la base de donnee
while (!($bdd = loadDb())) {
    echo '<script>';
    echo "alert('basse de donnee non trouver')";
    echo '</script>';
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


// ajout des equipes a la base de donnees
if (isset($_POST['tirage'])) {


    // reinitialisation des sessions
    session_destroy();

    //supression des anciennes tirages
    $bdd->query('DELETE FROM GROUPEA');
    $bdd->query('DELETE FROM GROUPEB');
    $bdd->query('DELETE FROM classementFinal');

    //Supresssion de la table gestionFinal
    $bdd->query('DELETE FROM gestionFinal');



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

    header('Location:../Vue/tirage.php?tirage=true');
   
}




// Affichage de l'equipe gagnante et de l'equipe perdante du match 13
$resultD = $bdd->query("SELECT equipeGagnante,equipePerdante From gestionFinal WHERE typeMatch='DemiFinal' and matchF='match13'");
if ($resultDemi = $resultD->fetchObject()) echo'';//creation de la variable resultDemi si la requete est true(il existe une quipeGagnante)

if(isset($_SESSION['prolongation']) && $_SESSION['prolongation']!=false)
echo "<script>"."alert('[ Prolongation --- Veuillez cliquer sur ok pour poursuivre le match ! ]')"."</script>"; 

// Affichage de l'equipe gagnante et de l'equipe perdante du match 14
$resultD1 = $bdd->query("SELECT equipeGagnante,equipePerdante From gestionFinal WHERE typeMatch='DemiFinal' and matchF='match14'");
if ($resultDemi1 = $resultD1->fetchObject()) echo ''; //creation de la variable resultDemi si la requete est true(il existe une quipeGagnante)

// // Affichage de l'equipe gagnante et de l'equipe perdante du match 15
$resultD2 = $bdd->query("SELECT equipeGagnante,equipePerdante From gestionFinal WHERE typeMatch='PetiteFinale' and matchF='match15'");
if ($resultPetiteFinale = $resultD2->fetchObject()) echo ''; //creation de la variable resultDemi si la requete est true(il existe une quipeGagnante)


// // Affichage de l'equipe gagnante et de l'equipe perdante du match 16
$resultD3 = $bdd->query("SELECT equipeGagnante,equipePerdante From gestionFinal WHERE typeMatch='GrandeFinale' and matchF='match16'");
if ($resultFinale = $resultD3->fetchObject()) echo ''; //creation de la variable resultDemi si la requete est true(il existe une quipeGagnante)


function flag($icone){
    return 'images/icones/'.$icone.'.png';
}
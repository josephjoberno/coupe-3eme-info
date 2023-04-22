<?php

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

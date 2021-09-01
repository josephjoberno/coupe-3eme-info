<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <nav>
        <ul>
            <a href="index.html">
                <li>Accueil</li>
            </a>
            <a href="#">
                <li>Tirage</li>
            </a>
            <a href="index3.php">
                <li>Classement</li>
            </a>
        </ul>
    </nav>
    <?php
    
        $tab_equipe = [
            'pays' => ['Bresil','France','Argentine','Italie','Espagne','Allemagne','Portugal','Haiti'],
            'drapeau' => [
                            '<img src="images/Flags/bresil.webp" alt="">','<img src="images/Flags/argentine.webp" alt="">',
                            '<img src="images/Flags/france.webp" alt="">','<img src="images/Flags/italie.webp" alt="">',
                            '<img src="images/Flags/espagne.webp" alt="">','<img src="images/Flags/allemagne.webp" alt="">',
                            '<img src="images/Flags/portugal.png" alt="">','<img src="images/Flags/haiti.png" alt="">'
                          ]
        ];

        //Creation d'un tableau des equipes par lots

        $tab_lot_equipe =[
            'lot_1' => ['Bresil','Argentine'],
            'lot_2' => ['France','Italie'],
            'lot_3' => ['Espagne','Allemagne'],
            'lot_4' => ['Portugal','Haiti']
        ];

    //Creation d'un tableau des drapeaux des equipes par lots

    $tab_flag_equipe =[
        'lot_1' => ['<img src="images/Flags/bresil.webp" alt="">','<img src="images/Flags/argentine.webp" alt="">'],
        'lot_2' => ['<img src="images/Flags/france.webp" alt="">','<img src="images/Flags/italie.webp" alt="">'],
        'lot_3' => ['<img src="images/Flags/espagne.webp" alt="">','<img src="images/Flags/allemagne.webp" alt="">'],
        'lot_4' => ['<img src="images/Flags/portugal.png" alt="">','<img src="images/Flags/haiti.png" alt="">']
    ];

        echo $tab_flag_equipe['lot_3'][0];
    ?>
    <center>
        <!-- Tableau des lots-->
        <h1>Equipes</h1>
        <form action="index2.php./" method="post">
        <table border="1">
            <tr>
                <th>Lot #1</th>
                <th>Lot #2</th>
                <th>Lot #3</th>
                <th>Lot #4</th>
            </tr>

            <tr>
                <?php
                    for($i = 0; $i <= 4; $i++ ){
                       echo ' <td>'.$tab_equipe['pays'][$i].'</td>';
                    }
                ?>
                <td>France <img src="images/Flags/france.webp" alt=""></td>
                <td>Espagne <img src="images/Flags/espagne.webp" alt=""></td>
                <td>Portugal <img src="images/Flags/portugal.png" alt=""></td>

             
            </tr>

            <tr>
                <td>Argentine <img src="images/Flags/argentine.webp" alt=""></td>
                <td>Italie <img src="images/Flags/italie.webp" alt=""></td>
                <td>Allemagne <img src="images/Flags/allemagne.webp" alt=""></td>
                <td>Haiti <img src="images/Flags/haiti.png" alt=""></td>
            </tr>
        </table>

        <br><br><br><br><br>
        <button type="submit" name="tirage">Tirage</button>
    </br></br></br>
    </form>


        <!-- Tableau des groupe-->
<?php
    if(isset($_POST['tirage'])){

    
?>
        <h1>Les Groupes</h1>

        <table border="1">
            <tr>
                <th></th>
                <th>GROUPE A</th>
                <th>GROUPE B</th>
            </tr>

            <tr>
                <td>1e tête de série (TDS)</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>2e tête de série (TDS)</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>3e tête de série (TDS)</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>4e tête de série (TDS)</td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <!-- Tableau pour le 1e tour du groupe A-->
        <h1>1e tour du groupe A</h1>

        <table border="1">
            <tr>
                <th>Groupe A</th>
                <th>Affiche</th>
                <th>Score</th>
            </tr>

            <tr>
                <td>Match 1</td>
                <td>1TDS VS 2TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 2</td>
                <td>3TDS VS 4TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 3</td>
                <td>1TDS VS 3TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 4</td>
                <td>2TDS VS 4TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 5</td>
                <td>1TDS VS 4TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 6</td>
                <td>2TDS VS 3TDS</td>
                <td></td>
            </tr>
        </table>


        <!-- Tableau pour le 1e tour du groupe B-->
        <h1>1e tour du groupe B</h1>

        <table border="1">
            <tr>
                <th>Groupe A</th>
                <th>Affiche</th>
                <th>Score</th>
            </tr>

            <tr>
                <td>Match 7</td>
                <td>1TDS VS 2TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 8</td>
                <td>3TDS VS 4TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 9</td>
                <td>1TDS VS 3TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 10</td>
                <td>2TDS VS 4TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 11</td>
                <td>1TDS VS 4TDS</td>
                <td></td>
            </tr>

            <tr>
                <td>Match 12</td>
                <td>2TDS VS 3TDS</td>
                <td></td>
            </tr>
        </table>

    </center>

    <style>
        ::-webkit-scrollbar {
            width: 13px;
        }

        ::-webkit-scrollbar-track {
            background-color: rgb(172, 196, 167);
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgb(72, 109, 64);
            border-radius: 7px;
        }

        body {
            background-image: url("images/fifa_18_soccer_video_game_stadium_4k_8k-7680x4320.jpg");
            background-size: cover;
            background-attachment: fixed;
        }

        table {
            width: 60%;
            height: 150px;
        }

        table th {
            background-color: rgb(124, 158, 116);
        }

        table td {
            background: rgba(255, 254, 254, 0.637);
        }

        table td img {
            width: 20px;
            height: auto;
        }
    </style>

<?php
    }
?>
</body>

</html>
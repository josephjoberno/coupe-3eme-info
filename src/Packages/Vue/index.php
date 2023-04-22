<?php
require '../Controleur/gestionUtilisateur.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Vue/css/index.css" />
  <link rel="stylesheet" href="../Vue/css/mediaQueries.css" />
  <title>| Accueil</title>
</head>

<body>

  <!------------------------------------------------------ PARTIE PRINCIPALE ----------------------------------------------------------->

  <section class="main">
    <header>
      <a href="#"><img src="../Vue/images/logo3foot1.png" class="logo" /></a>
      <div class="toggle"></div>
      <ul class="navigation">
        <li class="log"><a href="#">Login</a></li>
        <img src="../Vue/images/icones/male_user_25px.png" alt="" />
      </ul>
    </header>

    <!----------------------------------------------------------- PARTIE LOGIN -------------------------------------------------------------->

    <div class="popup">
      <div class="container">
        <div class="card">
          <div class="inner_box" id="card">
            <div class="card_front">
              <h2>LOGIN</h2>
              <?php
              if (isset($errors) && count($errors) > 0) {
                foreach ($errors as $error_msg) {
                  echo '<p>' . $error_msg . '</p>';
                }
              }
              ?>
              <form method="post">
                <input type="email" class="input_box" placeholder="Votre Email" name="email">
                <input type="password" class="input_box" placeholder="Mot de Passe" name="password">
                <button type="submit" class="submit_btn" name="btn_login">Envoyer</button>
                <input type="checkbox"><span>Remember me</span>
              </form>
              <button type="submit" class="btn" onclick="openRegister()">I'm new here</button>
              <b class="close">x</b>
            </div>
            <div class="card_back">
              <h2>REGISTER</h2>
              <?php
              if (isset($errors) && count($errors) > 0) {
                foreach ($errors as $error_msg) {
                  echo '<p>' . $error_msg . '</p>';
                }
              }

              if (isset($success)) {

                echo '<p>' . $success . '</p>';
              }
              ?>
              <form method="post">
                <input type="text" class="input_box" placeholder=" Votre nom d'utilisateur" name="username" required>
                <input type="email" class="input_box" placeholder="Votre Email" name="email" required>
                <input type="password" class="input_box" placeholder="Mot de Passe" name="password" required>
                <button type="submit" class="submit_btn" name="btn_register">Envoyer</button>
                <input type="checkbox"><span>Remember me</span>
              </form>
              <button type="submit" class="btn" onclick="openLogin()">
                I've an account
              </button>
              <!-- <b class="close2">x</b> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-------------------------------------------------------------- FIN LOGIN --------------------------------------------------------------------->

    <div class="content">
      <div class="text">
        <h2>Coupe<br />3eme <span>Info</span></h2>
        <p>
        La coupe 3eme info est une compétition de football lancé en 2021 sous la direction de
          l'INUKA et sous l'oeil avisé du Professeur Rony Bien-Aimé dans le
          cadre du développement sportif des étudiants de la 3eme année en
          Sciences Informatiques.
        </p>
        <p><i>Le succes ne s'imite pas,il se crée !</i></p>
        <a href="#" class="btnplay">Jouer Maintenant</a>
      </div>
      <div class="slider">
        <div class="slides active">
          <img src="../Vue/images/messi.png" alt="" />
        </div>
        <div class="slides">
          <img src="../Vue/images/ronaldo.png" alt="" />
        </div>
      </div>
    </div>

    <div class="footer">
      <ul class="sci">
        <li>
          <a href="#"><img src="../Vue/images/icones/facebook_25px.png" alt="" /></a>
        </li>
        <li>
          <a href="#"><img src="../Vue/images/icones/Instagram logo_25px.png" alt="" /></a>
        </li>
        <li>
          <a href="#"><img src="../Vue/images/icones/whatsapp_25px.png" alt="" /></a>
        </li>
      </ul>
      <div class="prevNext">
        <p>Edition 2021</p>
        <span class="prev"><img src="../Vue/images/icones/back_25px.png" alt="" /></span>
        <span class="next"><img src="../Vue/images/icones/forward_25px.png" alt="" /></span>
      </div>
    </div>
  </section>

  <!---------------------------------------------------------- COMPISITIONS DES EQUIPES ----------------------------------------------------------->

  <section class="composition">
    <h2>Composition</h2>
    <hr />
    <div class="box">
      <div class="box_content">
        <p>8 équipes</p>
      </div>

      <div class="box_content">
        <p>16 matchs</p>
      </div>
      <div class="box_content">
        <p>1 Coupe</p>
      </div>
    </div>

    <div class="box_2 ">
      <div class="box_content">
        <p>1 Finale</p>
      </div>

      <div class="box_content">
        <p>1 Vainqueur</p>
      </div>
    </div>
  </section>

  <!-------------------------------------------------- PRESENTATION DES EQUIPES ----------------------------------------------------------------->

  <div class="title">
    <h2>Présentation des équipes</h2>
    <hr />
  </div>

  <section class="presentation">
    <div class="content">
      <h2>Bresil</h2>
    </div>
    <div class="content">
      <h2>France</h2>
    </div>
    <div class="content">
      <h2>Espagne</h2>
    </div>
    <div class="content">
      <h2>Portugal</h2>
    </div>
    <div class="content">
      <h2>Argentine</h2>
    </div>
    <div class="content">
      <h2>Italie</h2>
    </div>
    <div class="content">
      <h2>Allemagne</h2>
    </div>
    <div class="content">
      <h2>Haiti</h2>
    </div>
  </section>

  <!--------------------------------------------------------- SPONSORS OFFICIELS ---------------------------------------------------------------->

  <section class="sponsors">
    <div class="title">
      <h2>Sponsors Officiels</h2>
      <hr />
    </div>
    <div class="sponsors_box">
      <div class="bg_color">
        <div class="img_box"><img src="../Vue/images/brana.png" alt="" /></div>
        <div class="img_box">
          <img src="../Vue/images/logo_INUKA.png" alt="" />
        </div>
        <div class="img_box">
          <img src="../Vue/images/digicel-logo-vector-removebg-preview.png" alt="" />
        </div>
        <div class="img_box">
          <img src="../Vue/images/ministere_des_sports-removebg-preview.png" alt="" />
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="../../Packages/Vue/js/script.js"></script>
</body>

</html>
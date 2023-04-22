<!-- Connexion a la base de donnees de MySQL -->
<?php

function loadDb()
{
    try {
        $user = 'root';
        $pass = 'root';
        $dsn = 'mysql:host=localhost;dbname=footballV1;charset-utf8';
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Echec de connexion a la base !".$e->getMessage();
        return false;
    }
}
?>
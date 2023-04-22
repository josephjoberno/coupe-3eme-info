
<?php

require_once '../Vue/connect.php';

$bdd = loadDb();
// ----------------------------TRAITEMENT LOGIN--------------------------------------------------

if (isset($_POST['btn_login'])) {
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
        $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
        setcookie('utilisateur', $_POST['email']);
        $nom = $_POST['email'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "select * from utilisateurs where email = :email ";
            $handle = $bdd->prepare($sql);
            $params = ['email' => $email];
            $handle->execute($params);
            if ($handle->rowCount() > 0) {
                $getRow = $handle->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $getRow['password'])) {
                    unset($getRow['password']);
                    $_SESSION = $getRow;
                    header('location:dashboard.php');
                    exit();
                } else {
                    $errors[] = "Email ou Mot de passe incorrect !";
                }
            } else {
                $errors[] = "Email ou Mot de passe incorrect !";
            }
        } else {
            $errors[] = "Email non valide !";
        }
    } else {
        $errors[] = "Veuillez saisir un email ou un mot de passe";
    }
}

// ---------------------------------- TRAITEMENT INSCRIPTION ---------------------------------------------------------------


if (isset($_POST['btn_register'])) {
    if (isset($_POST['username'], $_POST['email'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $options = array("cost" => 4);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $date = date('Y-m-d H:i:s');

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = 'select * from utilisateurs where email = :email';
            $stmt = $bdd->prepare($sql);
            $p = ['email' => $email];
            $stmt->execute($p);

            if ($stmt->rowCount() == 0) {
                $sql = "insert into utilisateurs (username, email, `password`, cree_le) values(:uname,:email,:pass,:cree_le)";

                try {
                    $handle = $bdd->prepare($sql);
                    $params = [
                        ':uname' => $username,
                        ':email' => $email,
                        ':pass' => $hashPassword,
                        ':cree_le' => $date,
                    ];

                    $handle->execute($params);

                    $success = 'Utilisateur cree avec succes !';
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            } else {
                $valUsername = $username;
                $valEmail = '';
                $valPassword = $password;

                $errors[] = 'Cet email est deja pris';
            }
        } else {
            $errors[] = "Veuillez saisir un email valide";
        }
    } else {
        if (!isset($_POST['username']) || empty($_POST['username'])) {
            $errors[] = 'Veuillez saisir un nom utilisateur';
        } else {
            $valUsername = $_POST['username'];
        }
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $errors[] = 'Veuillez saisir un email';
        } else {
            $valEmail = $_POST['email'];
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $errors[] = 'Veuillez saisir un mot de passe';
        }
        if (strlen(($_POST['password'])) < 6) {
            $errors[] = "Votre mot de passe doit contenir au moins 6 caracteres";
        } else {
            $valPassword = $_POST['password'];
        }
    }
}



?>

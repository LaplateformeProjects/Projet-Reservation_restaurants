<?php

if(session_id() == "") {
    session_start();
    
}

include("include/db.php");

if (isset($_POST['envoi'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        // Requête préparée pour sécuriser les entrées utilisateur
        $requser = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $requser->execute(array(":email" => $email));
        $userexist = $requser->rowCount();

        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            // Comparer le mot de passe avec celui en base de données via password_verify()
            if (password_verify($password, $userinfo['password'])) {
                session_start();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['role'] = $userinfo['role'];
                $_SESSION['userInfo'] = $userinfo;
                header('location: affichage_des_restaurants2.php');
            } else {
                $erreur = "Mauvais email ou mot de passe !";
            }
        } else {
            $erreur = "Mauvais email ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/toque-fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="include/navbar.css">
    <title>connexion</title>
    <link rel="stylesheet" href="connexion.css">

</head>

    <body>
    <div class="container">
        <div class="logo">
                <img src="images/toque.png" width="100" height="100">
        </div>

        <form method="POST" action=""><!--modif de action=""-->
            
            <h1>L'Epicurien</h1><br>
            <h2>Connexion</h2>
            <input type="email" placeholder="Votre mail" id="email" name="email" autocomplete="off" value="<?php if(isset($email)) { echo $email; } ?>" />
            <br>
            <input type="password" placeholder="Mot de passe" id="password" name="password" autocomplete="off">            
            <br><br>
            <input type="submit" value="Connexion" name="envoi">
            <br> 
            <a href="inscription.php">Pas de compte ?</a>

        </form>

        <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
        }

        ?>
    </div>
    </body>

   
</html>
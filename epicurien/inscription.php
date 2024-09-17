<?php

include("include/db.php");
 
if(isset($_POST['envoi'])) { /* si plusieurs paramètres fournis sont définis, alors isset() retournera True */
   
   $email= htmlspecialchars($_POST['email']);
   $conf_email= htmlspecialchars($_POST['conf_email']);
   $password= htmlspecialchars($_POST['password']);
   $conf_password= htmlspecialchars($_POST['conf_password']);
   $name= htmlspecialchars($_POST['name']);
   $first_name= htmlspecialchars($_POST['first_name']);

   $role = isset($_POST['role']) ? 1 : 0;
 
if(!empty($_POST['email']) 
   && !empty($_POST['conf_email']) 
   && !empty($_POST['password']) 
   && !empty($_POST['conf_password']) 
   && !empty($_POST['name']) 
   && !empty($_POST['first_name'])){ 

}

$check = true;

if($password !== $conf_password) {
   $check = false;
   $erreur = 'Vos mots de passe ne correspondent pas !';
}

if($check == true && !strlen($password) >= 8 
    && !preg_match('/[a-z]/', $password) 
    && !preg_match('/[A-Z]/', $password) 
    && !preg_match('/[0-9]/', $password) 
    && !preg_match('/[\W_]/', $password)) {
      $check = false;
      $erreur = 'Votre mot de passe doit contenir au moins 8 caractères, une majuscule, une lettre, un chiffre et un caractère spécial';
}

if($check == true) {
   if(strlen($first_name) > 30 || !ctype_upper($first_name[0])) {
      $check = false;
      $erreur = 'Votre prénom doit contenir maximum 30 caractères et commencer par une majuscule';
   }
}

if($check == true) {
   if(!strlen($name) > 30 || !strtoupper($name)) {
      $check = false;
      $erreur = 'Votre nom doit contenir maximum 30 caractères et entièrement en majuscule';
   }
}


if($email !== $conf_email) {
   $check = false;
   $erreur = 'Vos adresses mail ne correspondent pas !';
}

if($check == true) {
   if(!filter_var($email, FILTER_VALIDATE_EMAIL) && (strpos($email, '.fr') || !strpos($email, '.com'))) {
       $check = false;
       $erreur = 'Votre adresse mail doit contenir .fr ou .com';
   }
}

   if($check == true) {
      $reqemail = $pdo->prepare("SELECT count(*) FROM users WHERE email = :email");
      $reqemail->execute(array(":email" => $email));
      $count = $reqemail->fetchColumn();
      if($count > 0) {
         $check = false;
         $erreur = 'Adresse mail déjà utilisée !';
      }
   }

   if($check == true) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $insertuser = $pdo->prepare("INSERT INTO users (name, first_name, email, password, role) VALUES (:name, :first_name, :email, :password, :role)");
      $insertuser->execute(array(
         ":email" => $email, 
         ":password" => $password, 
         ":name" => $name, 
         ":first_name" => $first_name,
         ":role" => $role,));
      $erreur = 'Votre compte a bien été créé !';
      // header('location: connexion.php');

   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/toque-fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>
</head>

<body>
   
   <div class="container">
          
      <img class="logo" src="images/toque.png" width="100" height="100">
      
      <form method="POST" action="" align="center">
         
         <h1>L'Epicurien</h1><br>
         <h2>Inscrivez-vous avec votre adresse e-mail</h2>
         
      <div id=toggle>      
         <p>Je suis un professionnel</p>
         <label class="switch">
         <input type="checkbox" name="role">
         <span class="slider round"></span>
         </label>
      </div>

        <input type="email" placeholder="Votre mail" id="email" name="email" autocomplete="off" value="<?php if(isset($email)) { echo $email; } ?>" />
        <br>
        <input type="conf_email" placeholder="Confirmer votre email" id="conf_email" name="conf_email" autocomplete="off" value="<?php if(isset($conf_email)) { echo $conf_email; } ?>" />
        <br>
        <input type="password" placeholder="Mot de passe" id="password" name="password" autocomplete="off">
        <br>
        <input type="password" placeholder="Confirmez votre mot de passe" id="conf_password" name="conf_password" autocomplete="off">
        <br>
        <input type="text" placeholder="Nom" name="name">
        <br>
        <input type="text" placeholder="Prénom" name="first_name">
        <br><br>
        <input type="submit" value="Inscription" name="envoi">
        <a href= "connexion.php">Déjà inscrit ?</a>

      </form>

<?php
   if(isset($erreur)) {
      echo '<font color="red">'.$erreur."</font>";
   }
         
?>

   </div>

</body>

</html>
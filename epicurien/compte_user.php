<?php

if(session_id() == "") {
    session_start();
    
}

include("include/db.php");

if (!isset($_SESSION['id'])) {

    header('Location:affichage_des_restaurants2.php');
exit;

}

$requser = $pdo->prepare("SELECT * FROM users WHERE id = :id"); 
$requser->execute(['id' => $_SESSION["id"]]);  

$user = $requser->fetch();  

$user_name = $user['name'];
$user_first_name = $user['first_name'];
$user_address = $user['address'];
$user_address_code = $user['address_code'];
$user_phone = $user['phone'];
$user_city = $user['city'];

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/toque-fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="include/navbar.css">
    <link rel="stylesheet" href="compte_user.css">
    <title>Epicurien</title>
</head>

<body>
    <?php
        include("include/navbar.php")
    ?>

<div id="container_main">
    
    <div id="form">
    <form method="POST" action="">

        <div class="gender-label">
        <label for="men">Monsieur</label>
        </div>
        <input type="radio" id="man" name="gender" value="Monsieur">

        <div class="gender-label">
        <label for="women">Madame</label>
        </div>
        <input type="radio" id="woman" name="gender" value="Madame">
        <br>

        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value=<?php echo $user_name?>>
        <br>

        <label for="first_name">Prénom</label>
        <input type="text" id="first_name" name="first_name" value=<?php echo $user_first_name?>>
        <br>

        <label for="address">Adresse</label>
        <input type="text" id="address" name="address" value=<?php echo $user_address?>>
        <br>

        <label for="address_code">Code postal</label>
        <input type="number" id="address_code" name="address_code" value=<?php echo $user_address_code?>>
        <br>

        <label for="phone">Téléphone</label>
        <input type="tel" id="phone" name="phone" value=<?php echo $user_phone?>>
        <br>

        <label for="city">Ville</label>
        <input type="text" id="city" name="city" value=<?php echo $user_city?>>
        <br>

        <input type= "submit" value="Valider" name= "envoi">

    </form>
</div>
<?php 

if(isset($_POST['envoi'])) {
    $name = trim($_POST['name']); 
    $first_name = trim($_POST['first_name']);
    $address = $_POST['address'];
    $address_code = $_POST['address_code'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];       
    
    $requser = $pdo->prepare("UPDATE users SET name=:name, first_name=:first_name, address=:address, address_code=:address_code, phone=:phone, city=:city WHERE id = :id ");
    $requser->execute([
        'id' => $_SESSION["id"],
        'name' => $name,
        'first_name'=>$first_name,
        'address'=>$address,
        'address_code'=>$address_code,
        'phone'=>$phone,
        'city'=>$city,
    ]); 

    header('Location: compte_user.php');
}

?>
</div>

</body>

</html>
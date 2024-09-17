<?php

if(session_id() == "") {
    session_start();
    
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("include/db.php");

$requier = $pdo->prepare("SELECT id, image, name_restaurant, category, 
        opening_hours, closing_time
        FROM restaurants");

$requier->execute();
$restaurants = $requier->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/toque-fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="include/navbar.css">
    <link rel="stylesheet" href="reservation2.css">
    <title>L'Epicurien</title>
</head>

<body>



<?php
    include("include/navbar.php");
?>



<div id="main_container">
   

    <!-- <div class="titre"> -->
        <h1>Nos restaurants partenaires</h1>
        <br>
        <h2 >Les tendances du moment...</h2>
    <!-- </div> -->
    <div id="container">
    
    <?php
foreach ($restaurants as $cle => $valeur) { ?>
    <div id="bloc">
        <img class="photo" src="../uploads/<?= $valeur['image']?>" alt="">
        <div class="info">
            <div class="name">
                <h3><?= $valeur['name_restaurant']?></h3>
                <p><?= $valeur['category']?></p>
            </div>
        
            <div class="info_icon">
                <p>Ouvert de <?= $valeur['opening_hours']?> à <?= $valeur['closing_time']?></p> 
                <div class="card_button">
                    <a href="formulaire_de_reservation.php?id_restaurant=<?= $valeur['id']?>"><button>Réserver</button></a>
                </div>
                
            </div>

        </div>

    </div>  
    <?php } ?>
    </div>
















</div>
</body>
</html>
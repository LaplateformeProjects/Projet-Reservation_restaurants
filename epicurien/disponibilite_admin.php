<?php
    include("include/db.php");
    
    ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./images/toque-fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="include/navbar.css">
        <link rel="stylesheet" href="disponibilite_admin.css">
        <title>Epicurien</title>
    </head>
    <body>
        <?php
            include("include/navbar.php");
            ?>
<div id="main_container">
        <img class="imgheader" src="images/restau_francais_top.jpg" alt="Restaurant Capriccio">

    <div class="container_h"> 
        <h1> Le Vrai Paris</h1>
        <br>
        <h2>Restaurant Gastronomique Français</h2>
        <br>
        <h3>Horaires d'ouverture</h3>
        <br>
    </div>

    <div class="contenair1">
        <div class="days_div">
            <p>Lundi</p>
            <p>Mardi</p>
            <p>Mercredi</p>
        </div>
        <div class="times_div">
            <p>10H-00H</p>
            <p>10H-00H</p>
            <p>10H-00H</p>
        </div>
        <div class="days_div">
            <p>Jeudi</p>
            <p>Vendredi</p>
            <p>Samedi</p>
            <p class="dimanche">Dimanche</p>
        </div>
        <div class="times_div">
            <p>10H-00H</p>
            <p>10H-00H</p>
            <p>10H-00H</p>
            <p class="dimanche">Fermé</p>
        </div>
    </div>
</div>

</body>

</html>
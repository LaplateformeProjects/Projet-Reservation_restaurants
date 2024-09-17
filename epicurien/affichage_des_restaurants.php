<?php

session_start();

include("/CDPI-CANNES-GRP5/.gitignore/epicurien/include/db.php");


    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Epicurien</title>
    <!-- <link rel="stylesheet" href="reservation.css"> -->
    <link rel="stylesheet" href="include/navbar.css">
</head>
<body>
 
<?php
    include("include/navbar.php");
?>
 

<div id="container">

            <div class="titre">
                <h1>Nos restaurants partenaires</h1>
                <br>
                <h2 >Les tendances du moment...</h2>
            </div>


    
    <div class="restau-card">
        
        <div class="card">
        <div class="card-cover">
            <img src="images/restau_francais.jpg" width="468" height="248"/>
        </div>

        <div class="card-content">
            <div class="card-description">
                <h3 >Le Vrai Paris</h3>
                <p>Restaurant Gastronomique Francais</p>
            </div>
    
            <div class="card-infos">
                <p>Ouvre à 10H00 - 01H30</p> 
                <div class="card-note"><p>4,6 note</p><img src="images/note.png" width="25" height="25"></div>
            </div>
            <div class="card-button">      
                <button class="card-btn" type="button">Réserver</button>
            </div>
          </div>
        </div>
      <div class="card">
        <div class="card-cover">
            <img src="images/restau_asiat.jpg" width="468" height="248"/>
        </div>
<!-- ../epicurien/ -->
        <div class="card-content">
            <div class="card-description">
                <div class="card-hp">
                <h3>Kim-Do</h3>
                <p>Restaurant japonais</p>
                </div>
            </div>

            <div class="card-infos">
                <p>Ouvre à 12H00 - 00H30</p> 
                <div class="card-note"><p>4,4 note</p><img src="images/note.png" width="25" height="25"></div>
            </div>
            <div class="card-button">
                <button class="card-btn">Réserver</button>
            </div>
          </div>
        </div>
      <div class="card">
        <div class="card-cover">
            <img src="images/restau_italien.jpg" width="468" height="248"/>
        </div>

        <div class="card-content">
            <div class="card-description">
                <div class="card-hp">
                <h3>Capricio</h3>
                <p>Restaurant italien</p>
                </div>
            </div>

            <div class="card-infos">
                <p>Ouvre à 13H00 - 00H00</p> 
                <div class="card-note"><p>4,3 note</p><img src="images/note.png" width="25" height="25"></div>
            </div>
            <div class="card-button">
                <button class="card-btn">Réserver</button>
            </div>
          </div>
        </div>
    </div>
   <div class="card-pagination">    
        <button class="card-pgnt">↩Précédent</button>
        <button class="card-pgnt">1</button>
        <button class="card-pgnt">2</button>
        <button class="card-pgnt">3</button>
        <button class="card-pgnt">4</button>
        <button class="card-pgnt">Suivant↪</button>
   </div>




    </div>

  

</div>
   

</body>
</html>
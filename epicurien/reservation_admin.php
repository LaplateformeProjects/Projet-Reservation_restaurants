<?php

if(session_id() == "") {
    session_start();
    
}

include("/CDPI-CANNES-GRP5/.gitignore/epicurien/include/db.php");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Epicurien</title>
    <link rel="stylesheet" href="reservation_admin.css">
    <link rel="stylesheet" href="include/navbar.css">
</head>
<body>

<?php
    include("include/navbar.php");
?>


<div class="container">
<img class="imgheader" src="images/restau_francais_top.jpg" alt="Restaurant Francais">
<button class="btn-retour">←</button>

<div class="titre">
    <h1>Le Vrai Paris</h1>
</div>






</div>
</body>
</html>
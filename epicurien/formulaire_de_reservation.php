<?php

if(session_id() == "") {
    session_start();
    
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("include/db.php");

$booking_success = false;

$reqrestau = $pdo->prepare("SELECT * FROM restaurants WHERE id = :id");
$reqrestau->execute([":id"=> $_GET["id_restaurant"]]);
$restaurant = $reqrestau->fetch();

if (isset($_POST["envoi"])){
    if(!empty($_POST['date']) 
        && !empty($_POST['hour']) 
        && !empty($_POST['number_of_eaters']) 
        && !empty($_POST['type']) 
        && !empty($_SESSION['id'])) { /* l'utilisateur doit etre connecté */

        // Récupération et sécurisation des données du formulaire 
        $date = htmlspecialchars($_POST['date']);
        $hour = htmlspecialchars($_POST['hour']);
        $number_of_eaters = htmlspecialchars($_POST['number_of_eaters']);
        $type_of_booking = htmlspecialchars($_POST['type']);
        $diet = htmlspecialchars($_POST['diet'] ?? 'Aucune'); /* par défaut : "Aucune" */

        $insertbooking = $pdo->prepare("INSERT INTO booking 
        (date, hour, id_user, id_restaurant, number_of_eaters, type_of_booking) 
        VALUES (:date, :hour, :id_user, :id_restaurant, :number_of_eaters, :type_of_booking)");
        $insertbooking->execute(array(
        ":date" => $_POST['date'],
        ":hour" => $_POST['hour'],
        ":id_user" => $_SESSION['id'],
        ":id_restaurant" => $_GET['id_restaurant'],
        ":number_of_eaters" => $_POST['number_of_eaters'],
        ":type_of_booking" => $_POST['type'],
        ));
      $erreur = 'Votre table a bien été réservée !';
      $booking_success = true;

        // Affichage des informations (cela peut être remplacé par un envoi d'email ou un enregistrement dans une base de données)

    // } else {
    //     $erreur = "Tous les champs doivent être complétés !";
    //   }

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
    <link rel="stylesheet" href="formulaire_de_reservation.css">
    <title>Epicurien</title>
</head>
<body>
    <?php
        include("include/navbar.php")
    ?>


<div id="container_main">
    <?php if($booking_success == true): ?>
        <h1>Réservation effectuée !</h1><br>
        <h2>Vous allez être redirigé vers la page d'accueil dans 5 secondes...<h2><br>
        <p> <strong>Date :</strong> <?= $date ?></p> <br>;
        <p> <strong>Heure :</strong> <?= $hour ?></p> <br>;
        <p> <strong>Nombre de personnes :</strong> <?= $number_of_eaters ?></p> <br>;
        <p> <strong>Type de réservation :</strong> <?= $type_of_booking ?></p><br>;
        <!-- <p> <strong>Exigences diététiques :</strong>  . (!empty($diet) ? $diet : Aucune) . "</p><br>"; -->
    <?php else : ?>
        <img class="headerimg" src="../uploads/<?php echo $restaurant["image"] ?>">

    <h2>Formulaire de Réservation au "<?php echo $restaurant["name_restaurant"] ?>"</h2>
    <P><?php echo $restaurant["category"] ?></p>

    <div id="form">
        <form method="post" action="" align="center"><!--modif action=""-->


            <label for="date">Date de réservation (jj/mm/aaaa) :</label><br>
            <input class="rectangle" type="date" id="date" name="date" required><br><br>

            <label for="hour">Heure de réservation :</label><br>
            <input class="rectangle" type="time" id="hour" name="hour" required><br><br>

            <label for="guests">Nombre de personnes :</label><br>
            <input class="rectangle" type="number" id="number_of_eaters" name="number_of_eaters" min="1" required><br><br>

            <label for="type">Type de réservation :</label><br>
            <select class="rectangle" id="type" name="type" required>
                <option value="Dejeuner">Déjeuner</option>
                <option value="Diner">Dîner</option>
                <option value="Evenement special">Événement spécial</option>
            </select><br><br>

            <label for="diet">Avez-vous des exigences diététiques particulières ? Si oui, lesquelles ?</label><br>
            <textarea class="rectangle"  id="diet" name="diet" rows="4" cols="50"></textarea><br><br>

            <input type="submit" name="envoi" value="Envoyer la réservation">
        </form>
    </div>
<?php endif ?>
</div>

</body>
</html>

    
</body>
</html>

<?php 

if($booking_success == true) {
    sleep(5);
    header("location: affichage_des_restaurants2.php");
}
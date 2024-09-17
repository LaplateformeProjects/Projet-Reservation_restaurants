<?php
    include("include/db.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(isset($_POST["envoi"])){
        var_dump($_FILES);

        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($_FILES['photo_restaurant']['name']);
        move_uploaded_file($_FILES['photo_restaurant']['tmp_name'], $targetFile);
        // die();
                // Récupere Database
        $id_user = htmlspecialchars($_SESSION['id']);
        $name_restaurant = htmlspecialchars($_POST['name_restaurant']);
        $category = htmlspecialchars($_POST['category']);
        $email = htmlspecialchars($_SESSION['email']);
        $phone = htmlspecialchars($_SESSION['userInfo']['phone']);
        $adress = htmlspecialchars($_SESSION['userInfo']['address']);
        $adress_code = htmlspecialchars($_SESSION['address_code']);
        $opening_hours = htmlspecialchars($_POST['opening_hours']);
        $closing_time = htmlspecialchars($_POST['closing_time']);
        $restoration_capacity_noon = htmlspecialchars($_POST['restoration_capacity_noon']);
        $restoration_capacity_evening = htmlspecialchars($_POST['restoration_capacity_evening']);
        $events = htmlspecialchars($_POST['events']);

        // $diet = htmlspecialchars($_POST['diet']);
        $newResto = $pdo->prepare("INSERT INTO restaurants (image, id_user, name_restaurant, category, 
        opening_hours, 
        closing_time, 
        restoration_capacity_noon, restoration_capacity_evening, events) 
        VALUES (:image, :id_user, :name_restaurant, :category, 
        :opening_hours,
        :closing_time, 
         :restoration_capacity_noon, 
        :restoration_capacity_evening, :events)");
    
        $newResto->execute([
            "image" => $_FILES['photo_restaurant']['name'],
            "id_user" => $_SESSION['id'],
            "name_restaurant" => $name_restaurant,
            "category" => $category,
            "opening_hours" => $opening_hours,
            "closing_time" => $closing_time,
            "restoration_capacity_noon" => $restoration_capacity_noon,
            "restoration_capacity_evening" => $restoration_capacity_evening,
            "events" => $events,
        ]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/toque-fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="include/navbar.css">
    <link rel="stylesheet" href="creation_restaurant.css">
    <title>Epicurien</title>
</head>
<body>
    
<?php
    include("include/navbar.php")
?>

<div id= "main_container">
    <img class="imgheader" src="images/restau_francais_top.jpg" alt="Restaurant Capriccio">
    
    <div id="container_h" >
        <h1 class="h1">Le Vrai Paris</h1>
        <h2 class="h2">Restaurant Grastronomique Français</h2>
    </div>


    
<!--modif action=""-->
     <form method="post" action="" align="center" enctype="multipart/form-data">
        <label for="name">Nom du Gérant :</label><br>
        <input class="rectangle" type="text" id="id_user" name="id_user" required><br><br>

    <label for="name_restau">Nom du Restaurant :</label><br>
    <input class="rectangle" type="text" id="name_restaurant" name="name_restaurant" required><br><br>
            
        <label for="type_of_restaurant">Catégorie Restaurant :</label><br>
        <input class="rectangle" type="text" id="category" name="category" min="1" required><br><br>

        <label for="email">Adresse e-mail :</label><br>
        <input class="rectangle" type="email" id="email" name="email" required><br><br>

        <label for="address_code">Horaire d'ouverture:</label><br>
        <input class="rectangle" type="text" id="opening_hours" name="opening_hours" required><br><br>

        <label for="address_code">Horaire fermeture :</label><br>
        <input class="rectangle" type="text" id="closing_time" name="closing_time" required><br><br>

    <label for="address_code">Capacité d'acceuil midi:</label><br>
    <input class="rectangle" type="number" id="restoration_capacity_noon" name="restoration_capacity_noon" required><br><br>

    <label for="address_code">Capacité d'acceuil soir :</label><br>
    <input class="rectangle" type="number" id="restoration_capacity_evening" name="restoration_capacity_evening" required><br><br>

        <label for="address_code">Capacité d'acceuil pour les événements :</label><br>
        <input class="rectangle" type="number" id="events" name="events" required><br><br>

        <input type="file" name="photo_restaurant">

    <input class="Button" type="submit" name="envoi" value="Valider">
    </form>


</div>
</body>
</html>
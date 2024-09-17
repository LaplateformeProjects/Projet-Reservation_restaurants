

<?php 

if(session_id() == "") {
session_start();

}

    include("include/db.php");
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    /*var_dump($_SESSION['userInfo']);*/
?>


 <header>
    
<div class="menuheader"> 
    <ul>
        <li class="logo"> <img src="images/toque.png" alt="toquechef" /></li>
        <li class="rubrique"> <p>Menu</p></li>
   
</div>
    
<div class="separator"></div>
<?php
        // condition pour un user connecté

        
    if(isset($_SESSION['id']) && $_SESSION['role']==0) {

?>
                    <div class="user_connecte">
                        <li><a href="compte_user.php">Mon compte</a></li> 
                        <li><a href="affichage_des_restaurants2.php">Les Restaurants</a></li>
                        <!--<li><a href=" ">Mes Réservations</a></li>-->
                        <li><a href="formulaire_de_reservation.php">Formulaire de réservation</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>

                    </div>
<?php
    }
        // condition pour admin connecté // 

    elseif(isset($_SESSION['id']) && $_SESSION['role']==1) {

?>
                    <div class="admin_connecte">
                        <li><a href="compte_admin.php">Informations restaurant</a></li>
                    <div class="separator2"></div> 
                        <li><a href="disponibilite_admin.php">Mes disponibilités</a></li>
                    <div class="separator2"></div> 
                        <li><a href="reservation_admin.php">Mes Réservations</a></li>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                    </div>  

<?php
    }
        // condition deconnecté 
    else{
?>
    <div class="deconnecte">
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>

        
    </div>
<?php
        }
?>

     </ul>

 </header>

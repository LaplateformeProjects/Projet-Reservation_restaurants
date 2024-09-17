<?php

if(session_id() == "") {
    session_start();
    
}
/* ouverture d'une cession si necessaire

Configuration de la connexion à la base de données montrée par Thomas LPF bdname : nom de notre BDD */


$host = '136.243.172.164';
$port = '30005';
$dbname = 'cdpi_groupe5_dev2';
$username = 'cdpi_groupe5_dev2';
$password = 'cdpi_groupe5_dev2';

/* Options de PDO */
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $dsn = "mysql:host=$host; port=$port; dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

?>
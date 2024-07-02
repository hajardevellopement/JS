<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "produits";

// Créer une connexion
$conn = new mysqli($localhost, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion succefuly: " . $conn->connect_error);
}
?>

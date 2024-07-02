<?php
include 'connect.php'; 

if(isset($_POST['id_produit'], $_POST['titre'], $_POST['descrip'])) {
    $id_produit = $_POST['id_produit']; 
    $titre = $_POST['titre'];
    $descrip = $_POST['descrip'];

    $sql = "UPDATE produit SET titre='$titre', descrip='$descrip' WHERE id='$id_produit'";

    if ($conn->query($sql) === TRUE) {
        header("Location: resultat.php"); 
        exit();
    } else {
        echo "Erreur  " . $conn->error;
    }
}

$conn->close(); 
?>

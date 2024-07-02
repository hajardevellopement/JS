<?php
if(isset($_POST['id_produit'])) {
    $id_produit = $_POST['id_produit'];

    include 'connect.php';

    // Supprimer le produit de la base de données
    $sql = "DELETE FROM produit WHERE id_produit='$id_produit'";

    if ($conn->query($sql) === TRUE) {
        echo "Produit supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du produit : " . $conn->error;
    }

    $conn->close();
}
?>

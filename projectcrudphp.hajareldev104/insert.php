<?php
if(isset($_POST['btn_ajouter'])){ 
    $titre = $_POST['titre'];
    $descrip = $_POST['descrip'];
    include 'connect.php';

    if(!empty($titre) && !empty($descrip)){
        // Vérifier si le produit existe dans la base de données
        $sql = "SELECT titre, descrip FROM produit WHERE titre='$titre' AND descrip='$descrip'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $message = '<p style="color:red">Le produit existe déjà</p>';
        } else {
            
            if(isset($_FILES['image'])){
                $img_nom = $_FILES['image']['name']; // Récupération du nom de l'image
                $tmp_nom = $_FILES['image']['tmp_name'];
                $time = time(); // Récupération de l'heure actuelle
                $nouveau_nom_img = $time.$img_nom; // Renommer l'image

                // Déplacer l'image dans le dossier des images_produits
                $deplacer_image = move_uploaded_file($tmp_nom, "images_produits/".$nouveau_nom_img);
                if($deplacer_image){
                    // Insérer les données (titre, descrip, nom de l'image) dans la base de données
                    $sql = "INSERT INTO produit (titre, descrip, image) VALUES ('$titre', '$descrip', '$nouveau_nom_img')";
                    if ($conn->query($sql) === TRUE){
                        $message = '<p style="color:green">Produit ajouté !</p>';
                    } else {
                        $message = '<p style="color:red">Erreur lors de l\'ajout du produit : ' . $conn->error . '</p>';
                    }
                } else {
                    $message = '<p style="color:red">Erreur lors du téléchargement de l\'image.</p>';
                }
            } else {
                $message = '<p style="color:red">Veuillez télécharger une image.</p>';
            }
        }
    } else {
        $message = '<p style="color:red">Veuillez remplir tous les champs.</p>';
    }
    $conn->close();
}
?>

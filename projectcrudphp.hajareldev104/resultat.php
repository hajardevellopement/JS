<?php
include 'connect.php';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Liste des produits</title>
</head>
<body>
    <div class="container mt-5">
        <div class="result">
            <div class="result-content">
                <a href="index.php" class="btn btn-primary mb-4">Ajouter un produit</a>
                <h3 class="mb-4">Liste des produits</h3>
                <div class="liste-produits">
                    <?php
                    $sql = "SELECT * FROM produit";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="card mb-4">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="images_produits/' . $row['image'] . '" class="card-img" alt="Image produit">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">' . $row['titre'] . '</h5>
                                            <p class="card-text">' . $row['descrip'] . '</p>
                                            <a href="update.php?id_produit=' . $row['id_produit'] . '" class="btn btn-primary">Modifier</a>
                                            <form action="delete.php" method="POST" style="display: inline-block;">
                                                <input type="hidden" name="id_produit" value="' . $row['id_produit'] . '">
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    } else {
                        echo "Aucun produit dans la base de données";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$conn->close(); 
?>

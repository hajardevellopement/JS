<?php
include 'connect.php';
include 'insert.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <section class="input_add container mt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="message">
                    <?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?>
                </div>
                <label for="titre">Nom du produit</label>
                <input type="text" class="form-control" name="titre" id="titre">
            </div>
            <div class="form-group">
                <label for="descrip">Description du produit</label>
                <textarea name="descrip" class="form-control" id="descrip" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Ajouter une image</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-primary" name="btn_ajouter">Ajouter</button>
            <a class="btn btn-secondary ml-2" href="resultat.php">Liste des produits</a>
        </form>
    </section>
</body>
</html>

<?php

@$nom = $_POST['nom'];
@$prenom = $_POST['prenom'];
@$adresse = $_POST['adresse'];
@$nombre = $_POST['nombre'];
@$type = $_POST['type'];
if(isset($_POST['ingredients'])){
    @$ingredients = $_POST['ingredients'];
}else{
    @$ingredients=[];
}

@$valider = $_POST['valider'];
@$file=@$_FILES['cin'];
@$fileName=$file['name'];

if (@$_POST['nombre'] > 1000) {
    header('location:alertClient.php');
    }

if (!file_exists($fileName)){
    if (isset($file)){
        $fileName="CIN".strval(rand()).".jpg";
        move_uploaded_file($file['tmp_name'],__DIR__.'/cinUploads/'.$fileName);
    }
}else{
    echo 'Votre CIN existe déjà ';
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recap</title>
    <link rel="stylesheet" href="node_modules/bootswatch/dist/cyborg">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<div class="alert alert-success">Commande réussite !</div>
<div class="container ">

    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">Recap sur votre commande !</h5>

            <p class="card-text"><?php echo "Vous vous appelez " . $nom . " " . $prenom . ".<br>
        Vous habitez à " . $adresse . ".<br>Vous avez commandé " . $nombre . " sandwitch(s)\n
        de type " . $type . ".<br>Vous avez aussi choisi d'ajouter les ingredients suivants : " . implode(" / ", @$ingredients); ?>
            </p>
            <p><?php
                if ($nombre < 10) {
                    echo "Vous avez à payer un total de : " . ($nombre * 4) . "dt";
                } else {
                    echo "Vous avez bénéficier d'une réduction, votre total est : " . ($nombre * 4 * 0.9) . "dt";
                }
                ?></p>

        </div>
    </div>
</div>
</body>
</html>
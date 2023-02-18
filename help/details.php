<?php
session_start();
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        require_once('connect.php');

        $id=strip_tags($_GET['id']);
         $sql= 'SELECT * FROM `produit` WHERE `id`=:id;';

         $query=$db->prepare($sql);
         $query->bindValue(':id', $id, PDO::PARAM_INT);

         $query->execute();

         $produit=$query->fetch();

         if(!$produit){
             $_SESSION['erreur']="id invalide";
             header('Location: index.php');
         }
         require_once('close.php');

    }else{
        $_SESSION['erreur']= "URL invalide";
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details du produit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <h3>Details du produit <?= $produit['designation'] ?></h3>
        <p>ID: <?= $produit['id']?></p>
        <p>Désignation: <?= $produit['designation']?></p>
        <p>Quantité: <?= $produit['quantite']?></p>
        <p>Prix: <?= $produit['prix']?></p>
        <a href="index.php">Retour</a> <a href="edit.php?id=<?= $produit['id']?>">Modifier</a>

    </div>
    
</body>
</html>

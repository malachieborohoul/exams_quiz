session_start();
<?php
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        require_once('connect.php');

        $id=strip_tags($_GET['id']);

        $sql='SELECT * FROM `produit` WHERE `id`=:id;';

        $query=$db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        $produit=$query->fetch();

        if(!$produit)
        {
            $_SESSION['erreur']="id invalide";
        }else
        {
             $sql='DELETE FROM `produit` WHERE `id`=:id;';
             $query=$db->prepare($sql);

             $query->bindValue(':id', $id, PDO::PARAM_INT);
     
             $query->execute();
             $_SESSION['success']="Le produit a été supprimé";
             header('Location: index.php');
        
            require_once('close.php');

        }
    }


?>
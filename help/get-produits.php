<?php
    session_start();
    require_once ('connect.php');

    $sql= 'SELECT * FROM produit;';
    $query=$db->prepare($sql);
    $query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);

    require_once ('close.php');
    
    print_r(json_encode($result));


    
?>
<?php
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=db', 'root', '');
    }catch(PDOException $e){
        echo 'Erreur '. $e->getMessage();
    }
?>
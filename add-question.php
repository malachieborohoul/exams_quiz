<?php
session_start();
    require_once '../connect.php';

    if(isset($_POST['save_question_btn'])){
        $nom = $_POST['nom'];
        $options = $_POST['options'];
		var_dump($nom);

    }
       
    require_once '../close.php';
?>
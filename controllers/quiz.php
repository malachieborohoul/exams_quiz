<?php
require_once '../connect.php';
session_start();


// Get all quiz
if (isset($_GET['quiz'])) {
    $sql = 'SELECT * FROM quiz;';
    $query = $db->prepare($sql);
    if ($query->execute()) {
        $res = [
            "status" => 200,
            "res" => $query->fetchAll(PDO::FETCH_ASSOC)

        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            "status" => 500,
            "message" => "Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}


// MODIFIER UN QUIZ 
if(isset($_POST['btnedit'])){
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $temps = $_POST['temps'];
    $noteMax = $_POST['noteMax'];

    if($titre==NULL || $description==NULL || $temps==NULL || $noteMax==NULL){
        $res=[
            "status"=>422,
            "message"=>"Champs requis"
        ];
        echo json_encode($res);
        return false;
    }

    $sql= "UPDATE quiz SET titre='$titre', description='$description', temps='$temps', noteMax='$noteMax'   WHERE id='$id'";

    $query=$db->prepare($sql);

    if($query->execute()){
        $res=[
            "status"=>200,
            "message"=>"Quiz modifié"
        ];
        echo json_encode($res);
        return false;
    }else{
        $res=[
            "status"=>500,
            "message"=>"Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}

// SUPPRIMER UN QUIZ
if(isset($_POST['btndelete'])){
    $id = $_POST['id'];
  
    

    $sql= "DELETE FROM quiz WHERE id='$id'";

    $query=$db->prepare($sql);

    if($query->execute()){
        $res=[
            "status"=>200,
            "message"=>"Quiz supprimé"
        ];
        echo json_encode($res);
        return false;
    }else{
        $res=[
            "status"=>500,
            "message"=>"Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}

// GET A QUIZ

if(isset($_GET['quizId'])){
    $quizId = $_GET['quizId'];
    $_SESSION['quizId']=$quizId;




    $sql= "SELECT * FROM quiz WHERE id='$quizId';";
    $query=$db->prepare($sql);
    if($query->execute()){
        $res=[
            "status"=>200,
            "res"=>$query->fetch(PDO::FETCH_ASSOC),

        ];
        echo json_encode($res);
        return false;
    }else{
        $res=[
            "status"=>500,
            "message"=>"Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}


require_once '../close.php';


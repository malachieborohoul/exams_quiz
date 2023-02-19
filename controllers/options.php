<?php
session_start();
require_once '../connect.php';





// RECUPERER UNE OPTION

if(isset($_GET['optionId'])){
    $optionId = $_GET['optionId'];
    // $_SESSION['quizId']=$quizId;




    $sql= "SELECT * FROM options WHERE id_opt='$optionId';";
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

// MODIFIER UNE OPTION 
if(isset($_POST['btnedit'])){
    $id = $_POST['id'];
    $nom = $_POST['nom'];
   


    $sql= "UPDATE options SET nom_opt='$nom'  WHERE id_opt='$id'";

    $query=$db->prepare($sql);

    if($query->execute()){
        $sql= "SELECT * FROM options WHERE id_opt='$id'";

        $query=$db->prepare($sql);
        if($query->execute()){
            $res=[
                "status"=>200,
                "res"=>$query->fetch(PDO::FETCH_ASSOC),
                "message"=>"Option modifiée"
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
       
    }else{
        $res=[
            "status"=>500,
            "message"=>"Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}

// SUPPRIMER UNE OPTION
if(isset($_POST['btndelete'])){
    $id = $_POST['id'];
  
    
    $sql= "SELECT * FROM options WHERE id_opt='$id'";


    $query=$db->prepare($sql);

    if($query->execute()){
        $idQuestion=$query->fetch(PDO::FETCH_ASSOC);

        $sql= "DELETE FROM options WHERE id_opt='$id'";

        $que=$db->prepare($sql);
        if($que->execute()){
            $res=[
                "status"=>200,
                "res"=>$idQuestion,
                "message"=>"Option supprimée"
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

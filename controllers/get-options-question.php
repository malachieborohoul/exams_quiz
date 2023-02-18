<?php
    session_start();
    require_once '../connect.php';
    
    if(isset($_GET['questionId'])){
        $questionId = $_GET['questionId'];
        // $_SESSION['quizId']=$quizId;




        $sql= "SELECT * FROM options WHERE id_qs='$questionId';";
        $query=$db->prepare($sql);
        if($query->execute()){
            $res=[
                "status"=>200,
                "res"=>$query->fetchAll(PDO::FETCH_ASSOC),

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



    


    
?>
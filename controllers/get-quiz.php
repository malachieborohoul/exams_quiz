<?php
    session_start();
    require_once '../connect.php';
    
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



    


    
?>
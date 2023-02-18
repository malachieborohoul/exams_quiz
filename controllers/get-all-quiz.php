<?php
    require_once '../connect.php';

    $sql= 'SELECT * FROM quiz;';
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



    


    
?>
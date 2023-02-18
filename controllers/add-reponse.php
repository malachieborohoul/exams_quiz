<?php
session_start();
    require_once '../connect.php';

    
        if(isset($_POST['save_reponse_btn'])){
            $question_id = $_POST['question_id'];
            $reponse = $_POST['reponse'];
			

            // if($titre==NULL || $description==NULL || $temps==NULL || $noteMax==NULL){
            //     $res=[
			// 		"status"=>422,
			// 		"message"=>"Champs requis"
			// 	];
			// 	echo json_encode($res);
			// 	return false;
            // }

            $sql= "UPDATE questions SET id_option='$reponse' WHERE id_qs='$question_id'";
			$query=$db->prepare($sql);

			if($query->execute()){
			
				$res=[
					"status"=>200,
					"message"=>"Reponse ajoutée"
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
?>
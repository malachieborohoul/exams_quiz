<?php
session_start();
    require_once '../connect.php';

    
        if(isset($_POST['save_question_btn'])){
            $titre = $_POST['titre'];
            $note = $_POST['note'];
			$quizId= $_SESSION['quizId'];
            $options = $_POST['options'];

            // if($titre==NULL || $description==NULL || $temps==NULL || $noteMax==NULL){
            //     $res=[
			// 		"status"=>422,
			// 		"message"=>"Champs requis"
			// 	];
			// 	echo json_encode($res);
			// 	return false;
            // }

            $sql= "INSERT INTO questions (titre_qs, note_qs, id_qz) VALUES ('$titre', '$note', '$quizId')";
			$query=$db->prepare($sql);

			if($query->execute()){
				$idQuestion=$db->lastInsertId();
				for($i= 0; $i<count($options); $i++){
					$query=$db->prepare("INSERT INTO options (nom_opt, id_qs) VALUES ('$options[$i]','$idQuestion')");
					$query->execute();
				}
				$res=[
					"status"=>200,
					"message"=>"Question et options ajoutés"
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
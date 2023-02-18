<?php
    require_once '../connect.php';
        if(isset($_POST['btnsave'])){
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

            $sql= "INSERT INTO quiz (titre, description, temps, noteMax) VALUES ('$titre', '$description', '$temps', '$noteMax')";
			$query=$db->prepare($sql);

			if($query->execute()){
				$res=[
					"status"=>200,
					"message"=>"Quiz ajouté"
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
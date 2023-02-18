<?php
		require_once 'connect.php';
		
		if(isset($_POST['btnsave'])){
			$designation=$_POST['designation'];
			$quantite=$_POST['quantite'];
			$prix=$_POST['prix'];

			

			if($designation==NULL || $quantite==NULL || $prix==NULL){
				$res=[
					"status"=>422,
					"message"=>"Champs requis"
				];
				echo json_encode($res);
				return false;
			}
			$sql= "INSERT INTO produit (designation, quantite, prix) VALUES ('$designation', '$quantite', '$prix')";
			$query=$db->prepare($sql);

			if($query->execute()){
				$res=[
					"status"=>200,
					"message"=>"Produit ajouté"
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

		require_once ('close.php');



			
			
			
	 	
		
			
?>
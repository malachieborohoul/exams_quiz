<?php
	require_once 'connect.php';
	
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$stmt_edit = $db->prepare('SELECT * FROM produit WHERE id =:id');
		$stmt_edit->execute(array(':id'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
	}
	else
	{
		header("Location: index.php");
	}
	if(isset($_POST['btn_save_updates']))
	{
		$designation = $_POST['designation'];
		$quantite = $_POST['quantite'];		
		$prix = $_POST['prix'];		
		$imgFile = $_FILES['image']['name'];
		$tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
		if($imgFile)
		{
			$upload_dir = 'img/';
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
			$userprofile = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['image']);
					move_uploaded_file($tmp_dir,$upload_dir.$userprofile);
				}
				else
				{
					$errMSG = "Sorry, Your File Is Too Large To Upload. It Should Be Less Than 5MB.";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF Extension Files Are Allowed.";		
			}	
		}
		else
		{
			$userprofile = $edit_row['image'];
		}
		if(!isset($errMSG))
		{
			$stmt = $db->prepare('UPDATE produit SET designation=:designation, quantite=:quantite, prix=:prix, image=:image WHERE id=:id');
			$stmt->bindParam(':designation',$designation);
			$stmt->bindParam(':quantite',$quantite);
			$stmt->bindParam(':prix',$prix);
			$stmt->bindParam(':image',$userprofile);	
			$stmt->bindParam(':id',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated...');
				window.location.href='index.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry User Could Not Be Updated!";
			}
		}			
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP/MySQL Add, Edit, Delete, With User Profile.</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>

<div class="container">
	<div>
    	<h1 class="h2">&nbsp; Modifier<a class="btn btn-success" href="home.php" style="margin-left: 850px"><span class="glyphicon glyphicon-home"></span>&nbsp; Back</a></h1><hr>
    </div>
<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin: 0 300px 0 300px;border: solid 1px;border-radius:4px">
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
	<table class="table table-responsive">
        <tr>
            <td><label class="control-label">Désignation</label></td>
            <td><input class="form-control" type="text" name="designation" value="<?= $edit_row['designation'] ?>" required /></td>
        </tr>
        <tr>
            <td><label class="control-label">Quantité</label></td>
            <td><input class="form-control" type="text" name="quantite"value="<?= $edit_row['quantite'] ?>" required /></td>
        </tr>
        <tr>
            <td><label class="control-label">Quantité</label></td>
            <td><input class="form-control" type="text" name="prix" value="<?= $edit_row['prix'] ?>" required /></td>
        </tr>
        <tr>
            <td><label class="control-label">Profile Picture</label></td>
            <td>
                <p><img src="img/<?= $edit_row['image'] ?>" height="150" width="150" /></p>
                <input class="input-group" type="file" name="image" accept="image/*" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <button type="submit" name="btn_save_updates" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp; Save</button>
            <a class="btn btn-warning" href="home.php"> <span class="glyphicon glyphicon-remove"></span>&nbsp; Cancel</a>
            </td>
        </tr>
    </table>
</form>
</div>
</body>
</html>
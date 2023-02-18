
<!DOCTYPE html>
<html>
<head>
<title>CRUD</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container">
	
	<?php
	
	?>   
	 <?php
        if(!empty($_SESSION['erreur'])){
            echo '<div class="alert alert-danger role="alert"><span class="glyphicon glyphicon-info-sign">'.$_SESSION['erreur'].'</div>';
            $_SESSION['erreur']="";
        }
    ?>
    <?php
        if(!empty($_SESSION['success'])){
            echo '<div class="alert alert-success role="alert"> <span class="glyphicon glyphicon-info-sign">'.$_SESSION['success'].'</div>';
            $_SESSION['success']="";
        }
    ?>

<form id="addProduit"  class="form-horizontal" style="margin: 0 300px 0 300px;border: solid 1px;border-radius:4px"  >
	<table class="table table-responsive">
		<tr>
			<td><label class="control-label">Designation</label></td>
			<td><input class="form-control" type="text" name="designation" placeholder="Entrez la designation"  /></td>
		</tr>
		<tr>
			<td><label class="control-label">Quantité</label></td>
			<td><input class="form-control" type="number" name="quantite" placeholder="Entrez la quantité" value="<?php echo $quantite; ?>" /></td>
		</tr>
		<tr>
			<td><label class="control-label">Prix</label></td>
			<td><input class="form-control" type="number" name="prix" placeholder="Entrez la prix" value="<?php echo $prix; ?>" /></td>
		</tr>
		<tr>
	
    <tr>
        <td colspan="2" align="center"><button type="submit" name="btnsave" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp; Save</button>
        </td>
    </tr>
    </table>
</form>
</div>
	<script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<script> 
	$(document).ready(function () {
		$("#addProduit").submit(function (e) { 
			e.preventDefault();
			var formData = new FormData(this);
			formData.append('btnsave', true);
			$.ajax({
				method: "POST",
				url: "add-product.php",
				data: formData,
				processData: false,
                contentType: false,
				success: function (response) {
					var res= jQuery.parseJSON(response);
					if(res.status == 422){
						alert(res.message)
					}else if(res.status == 200){
						alert(res.message)
					}
				}
			});
		});
	});

	$(selector).click(function (e) { 
		e.preventDefault();
		
	});
</script>
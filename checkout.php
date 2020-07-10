<?php 
include("db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Example </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="vendor/bootstrap.js"></script>
	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="1.css">
	<link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.5.1.min.js">
</head>
<body >	
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">				
				<a href="cart.php">Quay về </a>  <hr>
			</div>
		</div>
	</div>

	<?php 

	if(!isset($_SESSION['email'] )){
		include('dangnhap.php');
	}else{
		include('payment.php');
	} 


	?>
	<br>
	<br>
	<br>
	
	<?php include('footer.php'); ?>
</body>
</html>
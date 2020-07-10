<?php 
include("db.php");
include("function.php");
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
	<div class="container">
		<br>
		<div class="row">
			<div class="col-sm-4">
				<p style="color:green; font-size: 20px;">Thanh toán online</p>
				<div class="logo-paypal text-center">
					<i class="fa fa-cc-visa" style="color:navy;"></i>
					<i class="fa fa-cc-amex" style="color:blue;"></i>
					<i class="fa fa-cc-paypal" style="color:red;"></i>
					<i class="fa fa-credit-card" style="color:orange;"></i>
				</div>
			</div>					
		</div>
		<br>
		<?php 
			$ip = get_ip();
			$get_customer = "SELECT * FROM users where ip_address = '$ip'";
			$run_customer = mysqli_query($con,$get_customer);
			$customer = mysqli_fetch_array($run_customer);
			$customer_id = $customer['id'];

		?>
		<div class="row">
			<div class="col-sm-4">
				<a href="order.php?c_id= <?php echo $customer_id ?>" title=""><p style="text-decoration: none;font-size: 20px; color:green;">Thanh toán trong tài khoản</p></a>
			</div>
		</div>
	</div>

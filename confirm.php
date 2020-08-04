<?php 
include('db.php');
include('function.php');
session_start();


if(isset($_GET['order_id'])) {
	$order_id = $_GET['order_id'];
}
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Example </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="vendor/bootstrap.js"></script>
	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="1.css">
	<link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<br>
	<br>
	<div class="container">	
		<div class="col-sm-12 push-sm-2">
			<form action="comfirm.php" method="post" accept-charset="utf-8" >
				<table width="800" align="center"  bgcolor="blue">

					<tr align="center">
						<td colspan="5"><h2><img src="img/logo.png" alt="" style="width: 50px">XÁC NHẬN THANH TOÁN</h2></td>

					</tr>	
					<tr >
						<td>Invoice No:</td>
						<td><input type="text" name ="inovice_no"> </td>
					</tr>
					<tr >
						<td>Amount sent:</td>
						<td><input type="text" name ="amount"> </td>
					</tr>
					<tr >
						<td>Select payment mode</td>
						<td> <select name="payment_method"> 
							<option> Select payment </option>
							<option> Dong A bank </option>
							<option> OCB bank </option>
							<option> Paypal </option>
						</td>
					</tr>
					<tr >
						<td>Payment date:</td>
						<td><input type="text" name ="date"> </td>
					</tr>
					<tr align="center">
						<td colspan="5"><input type="submit"  name="confirm" value ="ĐỒNG Ý THANH TOÁN"> </td>
					</tr>
				</table>	
			</form>
		</div>
	</div>
</body>
</html>

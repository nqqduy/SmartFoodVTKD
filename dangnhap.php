
<?php 
include('db.php');
include('function.php');
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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body >
	<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-3">				
			<a href="index.php">Trang chủ</a> >> Đăng nhập
		</div>
	</div>
</div>

<div class="container">
	<h1 style="text-align: center;">ĐĂNG NHẬP</h1>
			<!-- // <?php //if(isset($alert)):?>
		<section class="alert alert-danger">
			<?=$alert?>	
		</section>	
		<?php// endif; ?> -->
		<form  method="post">
			<label for="uname"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" name="password" placeholder="Enter Password" required>

			<button type="submit" name="login"value ="Login"class="btn btn-success">ĐĂNG NHẬP</button>	

		</form>
	</div>
	<br>
	<hr>

	<div class="container">

		<div class="row">
			<div class="col-sm-5">
				<h5>BẠN CHƯA CÓ TÀI KHOẢN ? <a href="dangky.php" title="">Click vào đây</a></h5>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<?php 
 	if(isset($_POST['login'])){

		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$password = md5($password);

		$run_login = mysqli_query($con, "select * from users where password='$password' AND email='$email' " );

		$check_login = mysqli_num_rows($run_login);

		$row_login = mysqli_fetch_array($run_login);

		if($check_login == 0){
			echo "<script>alert('Password or email is incorrect, please try again!')</script>";
			exit();
		}
		$ip = get_ip();

		$_SESSION['user_id'] = $row_login['id'];

		$_SESSION['role'] = $row_login['role'];

		$_SESSION['email'] = $email;

		// echo "<script>".strcmp($_SESSION['role'],"admin")."<script>";
		if (strcmp($_SESSION['role'],"admin")!=0){
			$run_cart = mysqli_query($con, "select * from cart where ip_address='$ip'");

			$check_cart = mysqli_num_rows($run_cart);

			if($check_login > 0 AND $check_cart == 0){
				echo "<script>alert('You have logged in successfully !')</script>";
				echo "<script>window.open('taikhoan.php','_self')</script>";

			}else{
				echo "<script>alert('You have logged in successfully !')</script>";
				echo "<script>window.open('checkout.php','_self')</script>";
			}
		}
		else{
			echo "login_success";
            echo "<script> location.href='admin/add_product.php'; </script>";
            exit;
		}
	}

?>
</body>
</html>


<?php 
include('db.php');
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
<body >
	<div class="banner_dangnhap">
		<nav class="navbar navbar-dark bg-inverse navbar-fixed-top tren">
			<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
				&#9776;
			</button>
			<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
				<a class="navbar-brand logo" href="#">SMART FOOD COURT SYSTEM</a>
				<ul class="nav navbar-nav float-sm-right trenphai">
					<li class="nav-item ">
						<a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="sanpham.php">Sản phẩm</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="quanly.php">Quản lý</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="dangxuat.php">Đăng xuất</a>
					</li>
				</ul>
			</div>
		</nav>	
	</div>
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
	<hr>

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
	include("footer.php");

	?>
	<?php 
	if(isset($_POST['login'])){
		$email =  $_POST['email'];
		$password =  trim($_POST['password']);
		$password = md5($password);


		$run_login =mysqli_query($con, "SELECT * from users where password = '$password' AND email = '$email'");
		$check_login = mysqli_num_rows($run_login);
		 $row_login = mysqli_fetch_array($run_login);
		if($check_login == 0)
		{
			echo "<script> alert('mật khẩu hoặc email không đúng, vui lòng nhập lại')</script>";
			exit();
		}
		$run_cart = mysqli_query($con, "select * from cart where ip_address='$ip'");
		$check_cart = mysqli_num_rows($run_cart);
		if($check_login > 0 && $check_cart == 0){

			$_SESSION['user_id'] = $row_login['id'];

			$_SESSION['role'] = $row_login['role'];

			$_SESSION['email'] = $email;
			echo "<script>alert('Đã đăng nhập thành công!')</script>";
			echo "<script>window.open('taikhoan.php','_self')</script>";

		}else{
			$_SESSION['user_id'] = $row_login['id'];

			$_SESSION['role'] = $row_login['role'];

			$_SESSION['email'] = $email;
			echo "<script>alert('You have logged in successfully !')</script>";
			echo "<script>window.open('thanhtoan.php','_self')</script>";
		}
	}
	?>
</body>
</html>
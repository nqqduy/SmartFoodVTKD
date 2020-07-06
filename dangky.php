
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
	<script>
		$(document).ready(function(){
			$("#confirm_password2").on('keyup',function()
			{	
				var confirm_password1 = $("#confirm_password1").val();
				var confirm_password2 = $("#confirm_password2").val();
				//alert(confirm_password2); 
				if( confirm_password1 == confirm_password2)
				{
					$("#confirm_password").html('<strong style="color:green;"> Mật khẩu trùng khớp</strong>');
				}
				else {
					$("#confirm_password").html('<strong style="color:red;">  Mật khẩu không khớp</strong>')
				}
			});
		});
	</script>
	<div class="banner_dangnhap">
		<nav class="navbar navbar-dark bg-inverse navbar-fixed-top tren">
			<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
				&#9776;
			</button>
			<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
				<a class="navbar-brand logo" href="index.php">SMART FOOD COURT SYSTEM</a>
				<ul class="nav navbar-nav float-sm-right trenphai">
					<li class="nav-item ">
						<a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="sanpham.php">Sản phẩm</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="quanly.php">Quản lý</a>
					</li> -->
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
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">				
				<a href="index.php">Trang chủ</a> >> Đăng ký
			</div>
		</div>
	</div>
	<hr>

	<div class="container">
		<h1 style="text-align: center;">ĐĂNG KÝ</h1>
			<!-- // <?php //if(isset($alert)):?>
		<section class="alert alert-danger">
			<?=$alert?>	
		</section>	
		<?php// endif; ?> -->
		<form  method="post">
			<label for="uname"><b>Name</b></label>
			<input type="text" placeholder="VD: Nguyễn Văn A" name="name" required>

			<label for="avartar"><b>Ảnh đại diện: </b></label>
			<input type="file" name="image"/> <br>

			<label for="psw"><b>Email</b></label>
			<input type="text" name="email" placeholder="VD : vana@hcmut.edu.vn" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" name="password" id="confirm_password1" placeholder="Enter Password" required>

			<label for="psw"><b>Confirm password</b></label>
			<input type="password" name="confirm_password" id="confirm_password2" placeholder="Enter Password" required>

			<p id = "confirm_password"></p>

			<button type="submit" name="register"value ="Register"class="btn btn-success">ĐĂNG KÝ</button>			
		</form>
	</div>
	<br>
	<hr>
	<br>
	<div class="container">

		<div class="row">
			<div class="col-sm-5">
				<h5>BẠN ĐÃ CÓ TÀI KHOẢN ? <a href="dangnhap.php" title="">Đăng nhập tại đây</a></h5>
			</div>
		</div>
	</div>
	<br>
	<br>
	<?php 
	include("footer.php");

	?>

	<?php 
	if(isset($_POST['register'])){  

		if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])){
			$ip = get_ip();
			$name = $_POST['name'];
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			$hash_password = md5($password);
			$confirm_password = trim($_POST['confirm_password']);

			$image = $_FILES['image']['name'];
			$image_tmp = $_FILES['image']['tmp_name'];

			$check_exist = mysqli_query($con,"select * from users where email = '$email'");

			$email_count = mysqli_num_rows($check_exist);

			$row_register = mysqli_fetch_array($check_exist);

			if($email_count > 0){
				echo "<script>alert('Sorry, email $email đã có trong hệ thống !')</script>";

			}else if($row_register['email'] !=$email && $password == $confirm_password ){

				move_uploaded_file($image_tmp,"img/$image");

				$run_insert = mysqli_query($con,"insert into users (ip_address,name,email,password,image) values ('$ip','$name','$email','$hash_password','$image') ");

				if($run_insert){
					$sel_user = mysqli_query($con,"select * from users where email='$email' ");
					$row_user = mysqli_fetch_array($sel_user);

					$_SESSION['user_id'] = $row_user['id'] ."<br>";
					$_SESSION['role'] = $row_user['role'];	
				}

				$run_cart = mysqli_query($con,"select * from cart where ip_address='$ip'");

				$check_cart = mysqli_num_rows($run_cart);

				if($check_cart == 0){

					$_SESSION['email'] = $email;

					echo "<script>alert('Tài khoản tạo thành công')</script>";

					echo "<script>window.open('taikhoan.php','_self')</script>";

				}else{

					$_SESSION['email'] = $email;

					echo "<script>alert('Tài khoản tạo thành công')</script>";

					echo "<script>window.open('checkout.php','_self')</script>";

				}

			}

		}

	}

	?>

	
</body>
</html>
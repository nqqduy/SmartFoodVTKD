<?php 
include("db.php");
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
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.5.1.min.js">
</head>
<body >
	<div class="banner_sanpham">
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
					<li class="nav-item active">
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
	<br>
	<div class="container">
		<a href="index.php" title="">Trang chủ</a> >> Quản lý
		</div>
		<br>
		<div class="container">
			<div clas="quanly">
				<a href="them_san_pham.php" title=""><img src="img/logo.png" alt="" style="width: 40px;	">Thêm sản Phẩm</a> <br> <hr>
				<a href="them_san_pham.php" title=""><img src="img/logo.png" alt="" style="width: 40px;	">Sửa sản Phẩm</a> <br> <hr>
				<a href="them_san_pham.php" title=""><img src="img/logo.png" alt="" style="width: 40px;	">Xóa sản Phẩm</a> <br> <hr>

			</div>
		</div>
		<br>
		<br>
		<br>

		<?php 
		include("footer.php")
		?>
	</body>
	</html>
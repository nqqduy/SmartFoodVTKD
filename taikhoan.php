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
	<link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body >
	<div class="banner_sanpham"> <!-- menu -->
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
					<li class="nav-item active">
						<a class="nav-link" href="taikhoan.php">Tài khoản</a>
					</li>	
					<li class="nav-item ">
						<a class="nav-link" href="dangxuat.php">Đăng xuất</a>
					</li>
				</ul>
			</div>
		</nav>	<!-- het menu -->
	</div>
	<br>
	<br>
	<br>
	<br>
	<div id="quanlytaikhoan"> <!-- taikhoan  -->
		<div class="container">
			<div class="row">
				<h4 style="color:#f47724;" id= "_info">Thông tin khách hàng</h4>
			</div> 
			<div class="row">
				<div class="col-sm-4 push-sm-4" style=" text-align: center; ">
					<img src="img/huan.jpg" alt="" style="width: 150px;">
				</div>
			</div>
			<br>
			<hr>

			<div class="row" style="text-align: center;">
				<div class="col-sm-5">
					<p style="background-color: #0c6aaa; color:white; display: inline-block; width:100%;text-align: center; font-size: 20px;" >THÔNG TIN CÁ NHÂN</p>

					<div class="row">
						<div class="col-sm-3 _ten">
							<p style="color:black; font-size: 16px;" class="">Tên</p>
						</div>
						<div class="col-sm-3  _ten">
							<p style="color:black; font-size: 16px;" class="_ten1">Huấn Hoan Hồng</p>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-3 _email">
							<p style="color:black; font-size: 16px;">Email</p>
						</div>
						<div class="col-sm-3 _email2">
							<p style="color:black; font-size: 16px;">CoLamMoiCoan@hcmut.edu.vn</p>
						</div>
					</div>
					<div class="row">

					</div>
				</div>
		<div class="col-sm-2"> </div>
				<div class="col-sm-5">
					<div class="dichvu">
						<div class="container">
							<h4 class="cc" style="color:red;">CÁC CHỨC NĂNG CỦA TÀI KHOẢN</h4>
							<li class="<?php if(isset($_GET['dat_hang'])){echo "active";} ?> cc">
								<a href="taikhoan.php?dat_hang">
									<i class="fa fa-list"></i> Đơn hàng của tôi
								</a>
							</li>
							<li class="<?php if(isset($_GET['tra_off'])){echo "active";} ?> cc ">
								<a href="taikhoan.php?tra_off">
									<i class="fa fa-bolt"></i> Thanh toán offline
								</a>
							</li>
							<li class="<?php if(isset($_GET['sua_tai_khoan'])){echo "active";} ?> cc">
								<a href="taikhoan.php?sua_tai_khoan">
									<i class="fa fa-pencil"></i> Cài đặt tài khoản
								</a>
							</li>
							<li class="<?php if(isset($_GET['thay_pass'])){echo "active";} ?>  cc">
								<a href="taikhoan.php?thay_pass">
									<i class="fa fa-user"></i> Thay mật khẩu
								</a>
							</li>
							<li class="<?php if(isset($_GET['xoa_tai_khoan'])){echo "active";} ?>  cc">
								<a href="taikhoan.php?xoa_tai_khoan">
									<i class="fa fa-trash-o"></i> Xóa tài khoản
								</a>
							</li>
							<li class="cc">
								<a href="dangxuat.php"  >
									<i class="fa fa-sign-out"></i> Đăng xuất
								</a>
							</li>
						</div>
					</div>
				</div> <!-- hết row của thông tin cá nhân -->
			</div> <!-- het container -->
		</div> <!-- het taikhoan --> 
	</div> <!-- het quan ly tai khoan -->
	<br>
	<hr>
	<br>
	<div class="box">
		<div class="container">
			<?php 
				if(isset($_GET['dat_hang'])) {
					include("dat_hang.php");
				}
			 ?>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php 
	include("footer.php");
	?>
</body>
</html>
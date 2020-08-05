
<?php 
include("db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title>Smart Food Court System  </title>
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
	<div class="banner">
		<nav class="navbar navbar-dark bg-inverse navbar-fixed-top tren">
			<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
				&#9776;
			</button>
			<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
				<a class="navbar-brand logo" href="index.php"> <img src="img/logo.png" alt="" style="width: 40px;"> SMART FOOD COURT SYSTEM</a>
				<ul class="nav navbar-nav float-sm-right trenphai">
					<li class="nav-item active">
						<a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="sanpham.php">Sản phẩm</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="quanly.php">Quản lý</a>
					</li> -->
						<li class="nav-item ">
						<?php
						if(isset($_SESSION['email'])){
							echo"<a class='nav-link' href='taikhoan.php'>Tài khoản</a>";
						}
						?>
					</li>					
					<li class="nav-item ">
						<?php
						
						if(isset($_SESSION['email'])){
							echo"<a class='nav-link' href='dangxuat.php'>Đăng xuất</a>";
						}
						?>
					</li>
				</ul>
			</div>
		</nav>
		<div class="banner1">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 push-sm-2 text-xs-center duyy">
						<img src="img/logo.png" alt="" class="logo1">
						<h1>BACH KHOA SMART FOOD</h1>
						<P style="color:yellow;">"Người thích ăn uống luôn luôn là những người tốt nhất" - Julia Child</p>
							<div class="register_login">
								<?php  
								if(!isset($_SESSION['email']))
								{
									echo"<a href='dangky.php' title=''><button type='button' class='btn btn-danger btn-lg' id='myBtn1'>Đăng Ký</button></a>";
									echo"<a href='dangnhap.php?action=login' title=''><button type='button' class='btn btn-default btn-lg' id='myBtn1'>Đăng nhập</button></a>";	
									echo"<br>"; echo"<br>";
									echo"<p style='color:white; font-size:20px;'><i class='fa fa-user 'aria-hidden='true'></i> Xin chào: khách hàng </p";						
								}
								else {
									echo"<p style='color:white; font-size:20px;'><i class='fa fa-user 'aria-hidden='true'></i> Xin chào: ".$_SESSION['email']."</p";
								}
								?>
							</div>
						</div>
					</div> <!-- het row -->
				</div><!--  het container	 -->
			</div> <!-- het banner -->
		</div>
	</div>
	<!-- center -->
	<div class="Gioithieu mt-3" style="background:#4d5f6b2b">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="0"></li>
							<li data-target="#carousel-example-generic" data-slide-to="0"></li>
						</ol>
						<div class="carousel-inner" role="listbox"  >
							<div class="carousel-item active">
								<img src="img/1.jpg" alt="First slide">
							</div>
							<div class="carousel-item">
								<img src="img/2.jpeg" alt="First slide">
							</div>
							<div class="carousel-item">
								<img src="img/3.jpg" alt="First slide">
							</div>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="icon-prev" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="icon-next" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div> <!-- end sm -2  -->
				<div class="col-sm-10">
					<h2 class="mt-2">GIỚI THIỆU</h2>
					<div class="gioithieu1">				
						Năm 2020, trường đại học bách khoa TP. Hồ Chí Minh mong muốn xây dựng một hệ thống tòa án thực phẩm thông minh (SFCS) để làm cho trường đại học thông minh hơn. Hệ thống này dành cho khách hàng đặt món ăn tại các khu ẩm thực hoặc trước khi đến những nơi đó.<br>
						Để hiện thực điều đó, nhóm tôi gồm 5 người và hiện thực hệ thống này.
					</div>
					<hr>
					<div class="anh">
						<img src="img/logo.png" alt="" style="width: 50px;"> SFCS - SMART FOOD COURT SYSTEM
					</div>

				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<div id="hot">
		<div class="box">
			<div class="container">
				<div class="col-sm-12">
					<h2>
						THỰC ĐƠN MÓN ĂN VÀ NƯỚC UỐNG
					</h2>
				</div>
			</div>
		</div>
	</div>
	<div id="content" class="container-fluid mt-3">
		<div class="row">
			<div class="col-sm-3">
				<div class="product">
					<a href="details.php">
						<img src="img/banhmi.jpg" alt="">
					</a>
					<div class="text bk">
						<h3>
							<a href="details.php" title="">
								BÁNH MỲ 
							</a> 
						</h3>
						<p class="gia">Giá : $1</p>
						<a href="details.php " title=""><button type="button" class="btn btn-success"> <i class="fa fa-shopping-cart"> Thêm vào giỏ </i></button></a>

					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="product">
					<a href="details.php">
						<img src="img/mixao.jpg" alt="">
					</a>
					<div class="text mt-2">
						<h3>
							<a href="details.php" title="">
								MÌ XÀO
							</a> 
						</h3>
						<p class="gia">Giá : $1,5</p>
						<a href="details.php " title=""><button type="button" class="btn btn-success"> <i class="fa fa-shopping-cart"> Thêm vào giỏ </i></button></a>
					</div>				
				</div>
			</div>


			<div class="col-sm-3">

				<div class="product">
					<a href="details.php">
						<img src="img/gachien.jpg" alt="">
					</a>
					<div class="text mt-2">
						<h3>
							<a href="details.php" title="">
								HỘP ĐÙI GÀ
							</a> 
						</h3>
						<p class="gia">Giá : $2</p>
						<a href="details.php " title=""><button type="button" class="btn btn-success"> <i class="fa fa-shopping-cart"> Thêm vào giỏ </i></button></a>					
					</div>
				</div>
			</div>


			<div class="col-sm-3  ">
				<div class="product">
					<a href="details.php">
						<img src="img/diacom.jpg" alt="">
					</a>
					<div class="text mt-2">
						<h3>
							<a href="details.php" title="">
								CƠM THẬP CẨM
							</a> 
						</h3>
						<p class="gia">Giá : $2</p>
						<a href="details.php " title=""><button type="button" class="btn btn-success"> <i class="fa fa-shopping-cart"> Thêm vào giỏ </i></button></a>

					</div>
				</div>
			</div>

		</div>
	</div>

	<div id="content" class="container-fluid mt-3">
		<div class="row">
			<div class="col-sm-3">
				<div class="product">
					<a href="details.php">
						<img src="img/banhmi.jpg" alt="">
					</a>
					<div class="text bk">
						<h3>
							<a href="details.php" title="">
								BÁNH MỲ 
							</a> 
						</h3>
						<p class="gia">Giá : $1</p>
						<a href="details.php " title=""><button type="button" class="btn btn-success"> <i class="fa fa-shopping-cart"> Thêm vào giỏ </i></button></a>

					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="product">
					<a href="details.php">
						<img src="img/mixao.jpg" alt="">
					</a>
					<div class="text mt-2">
						<h3>
							<a href="details.php" title="">
								MÌ XÀO
							</a> 
						</h3>
						<p class="gia">Giá : $1,5</p>
						<a href="details.php " title=""><button type="button" class="btn btn-success"> <i class="fa fa-shopping-cart"> Thêm vào giỏ </i></button></a>
					</div>				
				</div>
			</div>


			<div class="col-sm-3">

				<div class="product">
					<a href="details.php">
						<img src="img/gachien.jpg" alt="">
					</a>
					<div class="text mt-2">
						<h3>
							<a href="details.php" title="">
								HỘP ĐÙI GÀ
							</a> 
						</h3>
						<p class="gia">Giá : $2</p>
						<a href="details.php " title=""><button type="button" class="btn btn-success"> <i class="fa fa-shopping-cart"> Thêm vào giỏ </i></button></a>					
					</div>
				</div>
			</div>


			<div class="col-sm-3  ">
				<div class="product">
					<a href="details.php">
						<img src="img/diacom.jpg" alt="">
					</a>
					<div class="text mt-2">
						<h3>
							<a href="details.php" title="">
								CƠM THẬP CẨM
							</a> 
						</h3>
						<p class="gia">Giá : $2</p>
						<a href="details.php " title=""><button type="button" class="btn btn-success"> <i class="fa fa-shopping-cart"> Thêm vào giỏ </i></button></a>

					</div>
				</div>
			</div>

		</div>
	</div>
	<br>
	<br>
	<br>
	<div class="container-fluid"> 
		<h2 style="text-align: center;">HÌNH ẢNH CỦA CỬA HÀNG TẠI BÁCH KHOA TP.HCM</h2>
	</div>
	<hr>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<img src="img/bk.jpg" alt="" class="img-fluid" style="overflow: hidden; width:100%"> <br>
				<br>
				<p style="font-size: 20px; color:gray; text-align: center;" > Hình ảnh cửa hàng tại khu vực Bách Khoa TP. HCM </p> 
			</div>

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
	<?php 
	include("footer.php");

	?>
</body>
</html>
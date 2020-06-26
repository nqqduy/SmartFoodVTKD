<?php 
include('db.php');
include('function.php')
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
	<div class="ketqua">
		<div class="container-fluid">
			<div class="row">

				
				<div class="content_wrapper">
					<div id="sidebar">
						<div id="sidebar_title">Menu</div>
						<ul id="cats">
							<?php 
							getCats();
							?>
						</ul>
						<div id="sidebar_title">THỰC ĐƠN HÔM NAY</div>
						<ul id="cats">
							<?php 
							getThucPham();
							?>

						</ul>
					</div>
				</div>
				<div class="col-sm-3 push-sm-3">
					<h3 style=" text-align: center; padding-right:20px;">KẾT QUẢ TÌM KIẾM</h>
					</div>
					<br>
					<br>
					<?php 
					$run = 0;
					if(isset($_GET['search']))
					{	

						$search_query = $_GET['user_query'];
						$get_proc = "SELECT * FROM  product where product_title like '%$search_query%'";
						$run_pro = mysqli_query($con,$get_proc);

						while($row_pro = mysqli_fetch_array($run_pro)) {
							$run = 1;
							$pro_id = $row_pro['product_id'];
							$pro_cat = $row_pro['product_cat'];
							$pro_loai = $row_pro['product_loai'];
							$pro_title = $row_pro['product_title'];
							$pro_price = $row_pro['product_gia'];
							$pro_img = $row_pro['product_image'];
							$pro_mota = $row_pro['product_mota'];
							echo " 
							<div class='col-sm-3 duy1' style='margin-top:4%;'>
							<div class='card' style='width: 18rem; height:400px'>
							<img class='card-img-top img-fluid' src='img/$pro_img' alt='Card image cap'style='width:100%; height:179px'>
							<div class='card-body'>
							<h5 class='card-title tieude' style='
							text-align: center;
							padding-top: 5%; font-size: 30px; color:red;
							'>$pro_title</h5>
							<p class='card-text'style='color:blue; font-size: 20px;'>$pro_mota</p>
							<p style='font-size: 20px;'>Giá: $pro_price VNĐ</p>
							<a href='sanpham.php?add_cat=$pro_id ' class='duy11'><button type='button' class='btn btn-success'> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button></a>
							</div>
							</div>
							</div>
							";

						}

						if($run == 0)
						{
							echo " <div class='col-sm-3'>
							<h3 style='margin-top:15%; width:100%'>Không có sản phẩm cần tìm, bạn tìm kiếm bằng cách VD bạn muốn tìm bánh mì: Bánh mì hoặc Bánh hoặc mì  </h3> 
							<br>
							<a href='sanpham.php' style='text-decoration: none;'><h3> Quay lại <h3></a>
							</div>

							";
						}
					}
					?>
				</div>
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
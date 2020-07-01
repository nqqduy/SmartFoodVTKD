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
					<li class="nav-item active">
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
				<a href="index.php">Trang chủ</a> >> Sản phẩm
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div id="form" style="margin-top: 20px;">
				<form action="ketqua.php" method="get" accept-charset="utf-8" enctype="multipart/form-data">
					<input type="van ban" name="user_query" value="" placeholder="Tìm kiếm sản phẩm" style="padding: 8px;">
					<input type="submit" name="search"value="Search" style="padding: 8px;">
				</form>
			</div>
			<div class="cart" style=" float: left; margin: 26px 10px 0px 45px;
			height:35px; cursor: pointer; position: relative; top: 0px; right: 20px; width: 60px; text-align:center; z-index: 1000;
			"
			>
			<ul style="padding: 0; margin:0; list-style: none; position: relative; width: auto; z-index: 1;">
				<li class="dropdown_header_cart">
					<div id="notification_total_cart" class="shopping-cart">
						<a href="cart.php" title=""><img src="img/cart.png" id="cart_image" style="width: 30px;" alt=""></a>
						<div class="noti_cart_number">
							<?php total_items();?>
						</div><!-- /.noti_cart_number -->
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
<br>

<div class="content_wrapper">
	<div id="sidebar" >
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
<div class="menu">
	<h1 style="text-align: center;"> THỰC PHẨM VÀ ĐỒ UỐNG</h1>
</div>
<br>
<br>
<hr>
<div class="container-fluid ">
	<div class="row">
		<?php 
		$get_proc = "SELECT * FROM  product order by RAND() limit 0,20";
		$run_pro = mysqli_query($con,$get_proc);

		while($row_pro = mysqli_fetch_array($run_pro)) {
			$pro_id = $row_pro['product_id'];
			$pro_cat = $row_pro['product_cat'];
			$pro_loai = $row_pro['product_loai'];
			$pro_title = $row_pro['product_title'];
			$pro_price = $row_pro['product_gia'];
			$pro_img = $row_pro['product_image'];
			$pro_mota = $row_pro['product_mota'];
			echo " 
			<div class='col-sm-3 duy1'>
			<div class='card' style='width: 18rem; height:400px'>
			<img class='card-img-top img-fluid' src='img/$pro_img' alt='Card image cap'style='width:100%; height:179px'>
			<div class='card-body'>
			<h5 class='card-title tieude' style='
			text-align: center;
			padding-top: 5%; font-size: 30px; color:red;
			'>$pro_title</h5>
			<p class='card-text'style='color:blue; font-size: 20px;'>$pro_mota</p>
			<p style='font-size: 20px;'>Giá: $pro_price VNĐ</p>
			<a href='sanpham.php?add_cart=$pro_id ' class='duy11'><button type='button' class='btn btn-success'> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button></a>
			</div>
			</div>
			</div>
			";
		}
		?>

	</div>
</div>
<?php 
	cart();
?>
<hr>
<br>
<br>
<br>

<?php 
include("footer.php");

?>

</div>
</div>

</body>
</html>
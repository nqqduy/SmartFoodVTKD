<?php 
include("function.php");
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
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">				
				<a href="sanpham.php">Quay về </a>  <hr>
			</div>
		</div>
	</div>
	<div class="giohang">
		<div class="container">
			
			<h3>QUẢN LÝ GIỎ HÀNG CỦA BẠN</h3>
			<br>
			<h6>Tổng cộng mặt hàng đã đặt: <?php total_items(); ?></h6>
			<br>
			<h6>Tổng cộng giá đã đặt: <?php total_price(); ?></h6>
		</div>
	</div>
	<br>
	<hr>
	<div class="chitiet" style="text-align: center;">
		<div class="container">
			<div class="row">
				<?php
				$total = 0;

				$ip = get_ip();

				$run_cart = mysqli_query($con, "SELECT * from cart where ip_address='$ip' ");

				while($fetch_cart = mysqli_fetch_array($run_cart)){

					$product_id = $fetch_cart['product_id'];

					$result_product = mysqli_query($con, "SELECT * from product where product_id = '$product_id'");

					while($fetch_product = mysqli_fetch_array($result_product)){

						$product_price = array($fetch_product['product_gia']);

						$product_title = $fetch_product['product_title'];

						$product_image = $fetch_product['product_image'];

						$sing_price = $fetch_product['product_gia'];

						$values = array_sum($product_price);

						$run_qty = mysqli_query($con, "select * from cart where product_id = '$product_id'");

						$row_qty = mysqli_fetch_array($run_qty);

						$qty = $row_qty['quality'];

						$values_qty = $values * $qty;

						$total += $values_qty;
						?>
						<div class="_soluongsanpham mt-3">
							<div class="container">
								<div class="row">
									<div class="col-sm-3">
										<h4 style="text-align:center;">Xóa</h4>
										<div class="xoa" style="text-align:center";>
											<input type="checkbox" name="remove[]" value="">
										</div>
									</div>
									<div class="col-sm-3">
										<h4 style="text-align:center;"><?php echo $product_title; ?></h4>
										<br>
										<img style="width: 100px; height: 100px;"src="img/<?php echo $product_image; ?>" alt="">
									</div>
									<div class="col-sm-3">
										<h4 style="text-align:center;">Số lượng</h4>
										<div class="xoa" style="text-align:center;">
											<input type="text1" size="4"name="qty" value="" style="height: 20px; ">
										</div>
									</div>
									<div class="col-sm-3">
										<h4 style="text-align:center;">Giá</h4>

									</div>
								</div>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
		<br>
		<hr>
		<div class="_chitie" style="text-align:center;">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<input type="submit" name="update_cart" value="Update Cart" />
					</div>
					<div class="col-sm-3">
						<input type="submit" name="continue" value="Continue Shopping" />
					</div>
					<div class="col-sm-3">
						<button><a href="checkout.php">Checkout</a></button>
					</div>
				</div>
			</div>
		</div>
		<br>
		br
		<?php include('footer.php') ?>
	</body>
	</html>
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
			
			<h3 id ="_quanly">QUẢN LÝ GIỎ HÀNG CỦA BẠN</h3>
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
				<div class="col-sm-10 push-sm-1">
					<form action="" method="post" enctype="multipart/form-data" class="bang1">
						<table align="center" width="100%">

							<tr align="center">
								<th class="xoa" style="padding: 15px; text-align: center;"> 
									<h4>Xóa</h4>
								</th>
								<th class="sanpham"><h4 id ="sanpham">Sản phẩm</h4></th>
								<th  id="soluong"><h4 class="soluong">Số lượng</h4></th>
								<th class="col-sm-3" id="_gia"><h4>Giá</h4></th>
								<th class="col-sm-3" id="_gia"><h4>Tổng giá</h4></th>
							</tr>
							<?php 
							$total = 0;

							$ip = get_ip();

							$run_cart = mysqli_query($con, "select * from cart where ip_address='$ip' ");

							$cart_ids = array();

							while($fetch_cart = mysqli_fetch_array($run_cart)){

								$product_id = $fetch_cart['product_id'];

								$cart_id = $fetch_cart['cat_id'];

								array_push($cart_ids, $cart_id);

								$result_product = mysqli_query($con, "select * from product where product_id = '$product_id'");




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
									<tr align="center" class="col-sm-3">
										<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
										<td><input type="checkbox" name="remove[]" value="<?php echo $product_id;?>" /></td>
										<td style="color:green;">
											<h4><?php echo $product_title;?></h4>
											<img style="
											width: 205px;
											height: 160px;  padding: 15px;
											"src="product_images/<?php echo $product_image; ?> " />
										</td>
										<td><input type="text1" size="10" name="qty[]" id ="<?php echo $cart_id ?>" value="<?php echo $qty; ?>" />


										</td>
										
										
										<td id="_tien"><?php echo $sing_price;?> VNĐ</td>
										<td id="_ten"><?php echo $values_qty;?> VNĐ</td>
										
									</tr>								
								<?php }	

							} // End While  ?> 	

							<tr class="Cap_Nhap_Va_Thanh_Toan">
								<td> Nếu có thay đổi</td>
								<td> Vui lòng chọn: </td>
								<td id="Cap_Nhap"><input type="submit" name="update_cart" value="Cập nhật giỏ hàng" style="color:blue;" /></td>
								<td id = "Thanh_Toan"><button style="width: 100px;"><a href="checkout.php" style="text-decoration: none; color:red;">Thanh toán</a></td>
								</tr>
							</table>					
						</form>
					</div>

					<h4 style="color:red;" id="total"> Tổng cộng: <?php echo total_price(); ?></h4>
				</div>
			</div>
			<br>
			<hr>				
			<?php 
			if(isset($_POST['remove'])){

				foreach($_POST['remove'] as $remove_id){

					$run_delete = mysqli_query($con,"delete from cart where product_id = '$remove_id' AND ip_address='$ip' ");

					if($run_delete){
						echo "<script>window.open('cart.php','_self')</script>";
					}
				}

			}
			if(isset($_POST['update_cart']))
			{
				foreach(array_map(null, $_POST['qty'], $cart_ids) as $it) {
					$insert_qty = "UPDATE cart set quality ='$it[0]' where cat_id = '$it[1]' ";
					$run_qty = mysqli_query($con, $insert_qty);
					$values_qty = $values * $qty;
				}

				echo "<script>window.open('cart.php','_self')</script>";
			}

			?>

			<br>
		</div>
	</div>
	<?php include('footer.php') ?>
</div>
</body>
</html>
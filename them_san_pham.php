
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
		<div class="form_box">

			<form action="them_san_pham.php" method="post" enctype="multipart/form-data">

				<table align="center" width="100%">

					<tr>
						<td colspan="7">
							<a href="index.php" title=""><img src="img/logo.png" alt="" style="width:90px; margin-left: 45%"></a>
							<h2 style="text-align:center; color:red;">THÊM SẢN PHẨM - DÀNH CHO QUẢN LÝ</h2>
							<div class="border_bottom"></div><!--/.border_bottom -->
						</td>
					</tr>
					<a href="index.php" title="">Trang chủ</a> >> <a href="quanly.php" title="">Quản lý</a>>> Thêm sản phẩm
					<tr>
						<td><b>Tên Sản Phẩm:</b></td>
						<td><input type="text" name="product_title" size="70" required/></td>
					</tr>

					<tr>
						<td><b>Sản phẩm thuộc mục:</b></td>
						<td>
							<select name="product_cat">
								<option>Chọn mục</option>

								<?php 
								$get_cats ="select * from sanpham";

								$run_cats = mysqli_query($con, $get_cats);

								while($row_cats=mysqli_fetch_array($run_cats)){
									$cat_id = $row_cats['cat_id'];

									$cat_title = $row_cats['cat_title'];

									echo "<option value='$cat_id'>$cat_title</option>";
								}
								?>
							</select>
						</td>

					</tr>

					<tr>
						<td><b>Sản phẩm thuộc loại:</b></td>
						<td>
							<select name="product_brand">
								<option>Chọn loại</option>
								<?php
								$get_brands = "select * from cac_thuc_pham";

								$run_brands = mysqli_query($con, $get_brands);

								while($row_brands = mysqli_fetch_array($run_brands)){
									$brand_id = $row_brands['cac_thuc_pham_id'];

									$brand_title = $row_brands['cac_thuc_pham_title'];

									echo "<option value='$brand_id'>$brand_title</option>";
								}

								?>
							</select>
						</td>

					</tr>

					<tr>
						<td><b>Hình ảnh sản phẩm: </b></td>
						<td><input type="file" name="product_image" /></td>
					</tr>

					<tr>
						<td><b>Giá sản phẩm: </b></td>
						<td><input type="text" name="product_price" required/></td>
					</tr>

					<tr>
						<td valign="top"><b>Mô tả sản phẩm :</b></td>
						<td><textarea name="product_desc"  rows="10"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="7"><input type="submit" name="insert_post" value="Thêm sản phẩm"/></td>
					</tr>
				</table>

			</form>

		</div>

		<?php 

		if(isset($_POST['insert_post'])){
			$product_title = $_POST['product_title'];
			$product_cat = $_POST['product_cat'];
			$product_brand = $_POST['product_brand'];
			$product_price = $_POST['product_price'];
			$product_desc = trim(mysqli_real_escape_string($con,$_POST['product_desc']));
			$product_image  = $_FILES['product_image']['name'];
			$product_image_tmp = $_FILES['product_image']['tmp_name'];
			move_uploaded_file($product_image_tmp,"img/$product_image");
			$insert_product = " insert into product (product_cat,product_loai,product_title,product_gia,product_mota,product_image) 
			values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image') ";

			$insert_pro = mysqli_query($con, $insert_product);

			if($insert_pro){
				echo "<script>alert('Sản phẩm thêm thành công')</script>";
				echo "<script>window.open('sanpham.php?them_san_pham.php','_self')</script>";
			}

		}
		?>
	</div>

	<?php 
	include("footer.php")
	?>
</body>
</html>






<?php

include("../db.php");
session_start();


if(isset($_POST['submit']))
{
$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$product_brand = $_POST['product_brand'];
$product_price = $_POST['product_price'];
$product_desc = trim(mysqli_real_escape_string($con,$_POST['product_desc']));
$product_keywords = $_POST['product_keywords']; 

$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
		
mysqli_query($con," insert into product (product_cat, product_loai, product_title, product_gia, product_mota, product_image) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$pic_name') ") or die ("query incorrect");

 header("location: sumit_form.php?success=1");
}

mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>
 
   	 <?php include("include/header.php");?>
   	<div class="container-fluid">
	<?php include("include/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#c4e17f">
	<h1><span class="glyphicon glyphicon-tag"></span> Thêm sản phẩm  </h1></div><br>
	<div class="panel-body" style="background-color:#E6EEEE;">
		<div class="col-lg-7">
        <div class="well">
        <form action="add_product.php" method="post" name="form" enctype="multipart/form-data">
        <p>Tên sản phẩm</p>
        <input class="input-lg thumbnail form-control" type="text" name="product_title" id="product_title" autofocus style="width:100%" placeholder="Tên sản phẩm" required>
<p>Mô tả sản phẩm</p>
<textarea class="thumbnail form-control" name="product_desc" id="product_desc" style="width:100%; height:100px" placeholder="Viết gì đó về sản phẩm ..." required></textarea>
<p>Hình ảnh minh họa</p>
<div style="background-color:#CCC">
<input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
</div>
</div>
<div class="well">
<h3>Giá sản phẩm</h3>
<p>Giá</p>
<div class="input-group">
      <div class="input-group-addon">VNĐ</div>
      <input type="text" class="form-control" name="product_price" id="product_price"  placeholder="69.969" required>
    </div><br>


    </div>
        </div>  
        <div class="col-lg-5">
        <div class="well">
<h3>Category</h3>  
<p>Phân loại sản phẩm</p>
<input type="number" name="product_cat" id="product_cat" class="form-control" placeholder="1 Đồ ăn, 2 Thức uống">
<br>
<p>Nhãn sản phẩm</p>
<input type="number" name="product_brand" id="product_brand" class="form-control" placeholder="1 Mì, 2 Bánh, 3 Nước, 4 Cơm, 5 Ăn vặt">
<br>
<p>Keywords</p>
<input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="...">
</div>          
</div>

<div align="center">
    <button type="submit" name="submit" id="submit" class="btn btn-default" style="width:100px; height:60px"> Cancel</button>
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px"> Add Product</button>
    </div>
        </form>
 
	</div>
</div></div></div>
<?php include("include/js.php"); ?>
</body>
</html>
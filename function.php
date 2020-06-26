<?php 
$con = mysqli_connect("localhost","root","","bk-food");
if(mysqli_connect_errno()) {
	echo "Kết nối database bị lỗi!".mysqli_connect_error();
}
function getCats() {
	global $con;
	$get_cats = " SELECT * FROM sanpham";
	$run_cats = mysqli_query($con,$get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats))
	{
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		echo "<li ><a href='sanpham.php?cat=$cat_id'>$cat_title</a></li>";

	}
}
function getThucPham()
{
	global $con;
	$get_cats = " SELECT * FROM cac_thuc_pham";
	$run_cats = mysqli_query($con,$get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats))
	{
		$cac_thuc_pham_id = $row_cats['cac_thuc_pham_id'];
		$cac_thuc_pham_title = $row_cats['cac_thuc_pham_title'];

		echo "<li ><a href='sanpham.php?brand=$cac_thuc_pham_id'>$cac_thuc_pham_title</a></li>";

	}
}
function get_ip(){
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
function total_items(){
	global $con;
	
	$ip = get_ip();

	$run_items = mysqli_query($con,"select * from cart where ip_address='$ip' ");
	
	echo $count_items = mysqli_num_rows($run_items);
}

function total_price(){
      
   global $con;
   
   $total = 0;
   
   $ip = get_ip();
   
   $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip' ");
   
   while($fetch_cart = mysqli_fetch_array($run_cart)){
       
	   $product_id = $fetch_cart['product_id'];
	   
	   $result_product = mysqli_query($con, "select * from product where product_id = '$product_id'");
	   
       while($fetch_product = mysqli_fetch_array($result_product)){
                
		$product_price = array($fetch_product['product_gia']);

        $product_title = $fetch_product['product_title'];

        $product_image = $fetch_product['product_image'];
        
        $sing_price = $fetch_product['product_gia'];
        
		$values = array_sum($product_price);
		
		// Getting Quality of the product
		
		$run_qty = mysqli_query($con, "select * from cart where product_id = '$product_id'");
		
		$row_qty = mysqli_fetch_array($run_qty);
		
		$qty = $row_qty['quality'];
		
		$values_qty = $values * $qty;
		
		$total += $values_qty;
				
       }	   
   }
   
   echo "$total VNĐ";
   
}
?>
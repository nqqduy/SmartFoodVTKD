<?php 
include("function.php");

if(isset($_GET['c_id']))
{
	$customer_id = $_GET['c_id'];
}
	$total = 0;

	$ip = get_ip();

	$run_cart = mysqli_query($con, "SELECT * from cart where ip_address='$ip' ");

	$status = 'Pending';
	$invoice_no = mt_rand();

	while($fetch_cart = mysqli_fetch_array($run_cart)){

		$product_id = $fetch_cart['product_id'];

		$result_product = mysqli_query($con, "SELECT * from product where product_id = '$product_id'");

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

	echo " $total VNĐ";


?>
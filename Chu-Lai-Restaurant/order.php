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

$count_pro = mysqli_num_rows($run_cart);

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

$get_cart = "SELECT * FROM cart";

$run_cart = mysqli_query($con, $get_cart);

$get_qty = mysqli_fetch_array($run_cart);

$qty = $get_qty['quality'];

if($qty == 0)
{
	$qty = 1;

	$sub_total = $total;

}
else {
	$qty = $qty;

	$sub_total = $total*$qty;
}

$insert_order = "INSERT into customer_order (order_id, customer_id, due_amount, invoice_no, total_products, order_date, order_status) values ('','$customer_id','$total','$invoice_no','$count_pro',NOW(),'$status')";

$run_order = mysqli_query($con, $insert_order);
$empty_cart = "DELETE from cart where ip_address='$ip'";
$run_empty = mysqli_query($con,$empty_cart);

$insert_to_pending_orders = "INSERT into pending_order (customer_id ,invoice_no, product_id , qty ,order_status) values ('$customer_id','$invoice_no','$product_id','$qty','$status')";

$run_pending_order = mysqli_query($con,$insert_to_pending_orders);

echo "<script> alert('Đơn hàng đã đặt thành công')</script>";
echo "<script>window.open('taikhoan.php','_self')</script>";
?>
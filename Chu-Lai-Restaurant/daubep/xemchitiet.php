<?php 
include('../db.php');

$result=mysqli_query($con,"select order_id, due_amount, invoice_no, total_products, order_date, order_status, name, email from customer_order, users where customer_order.customer_id=users.id Limit $page1,10")or die ("query 1 incorrect....."); 


while(list($order_id, $due_amount, $invoice_no, $total_products, $order_date, $order_status, $name, $email)=mysqli_fetch_array($result)){


	$get_orders ="select * from chef where invoice_no='$invoice_no'";
	$run_orders = mysqli_query($con, $get_orders);
	$run_orders_1 = mysqli_fetch_array($get_orders);
	while($run_orders_1) {
		$get_sanpham = $run_orders_1['product_id'];

		$get_sanpham = "select*form product"
		echo "cc ";
	}

}
?>
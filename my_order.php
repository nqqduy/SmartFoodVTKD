<?php 
include("db.php");
$c = $_SESSION['email'];

$get_c = "SELECT * from users where email = '$c'";

$run_c = mysqli_query($con, $get_c);

$row_c = mysqli_fetch_array($run_c);

$customer_id = $row_c['id'];

?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 push-sm-1">
			<table width="1024" align="center" bgcolor="#1488db" class="table-bordered">
				<tr>
					<th class="duyy1" style="text-align: center;">Thứ tự</th>
					<th class="duyy1" style="text-align: center;">Tổng giá tiền</th>
					<th class="duyy1" style="text-align: center;">Số hóa đơn</th>
					<th class="duyy1" style="text-align: center;">Tổng sản phẩm</th>
					<th style="text-align: center;">Ngày đặt</th>
					<th class="duyy1" style="text-align: center;">Thanh toán / chưa thanh toán</th>
					<th class="duyy1" style="text-align: center;">Trạng thái</th>
					<th class="duyy1" style="text-align: center;">Chi tiết</th>
				</tr>	
				<?php 
				$get_orders ="select * from customer_order where customer_id='$customer_id'";
				$run_orders = mysqli_query($con, $get_orders);
				$i = 0;
				while($row_orders = mysqli_fetch_array($run_orders))
				{
					$order_id = $row_orders['order_id'];
					$due_amount = $row_orders['due_amount'];
					$inovice_no = $row_orders['invoice_no'];
					$products = $row_orders['total_products'];
					$date = $row_orders['order_date'];
					$status = $row_orders['order_status'];
					$i++;
					if($status == 'Pending') {
						$status = 'Chưa thanh toán';

					}
					else {
						$status = 'Đã thanh toán';
					}
					echo"
					<tr align='center'>			
					<td> $i</td>
					<td>$due_amount</td>
					<td>$inovice_no</td>
					<td>$products</td>
					<td>$date</td>
					<td>$status</td>
					<td><a href='confirm.php?order_id=$order_id'> Xác nhận thanh toán </td>
					<td><a href='chitiet.php?chitiet=$order_id'> xem chi tiết đơn hàng </td>
					</tr>";	
				}
				?>
			</table>
		</div>
	</div>
</div>
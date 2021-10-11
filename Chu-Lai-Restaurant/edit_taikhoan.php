<?php 
@session_start();
include("db.php");
if(isset($_GET['edit_taikhoan']))
{
	$customer_email = $_SESSION['email'];

	$get_customer = "SELECT * FROM users where  email = '$customer_email'";

	$run_customer = mysqli_query($con, $get_customer);

	$row = mysqli_fetch_array($run_customer);

	$id = $row['id'];

	$name = $row['name'];

	$password = $row['password'];

	$image = $row['image'];

}

?>
<div class="container">
	<div class="col-sm-12 push-sm-1">
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">

			<table align="center" width="800">
				<tr>
					<td colspan="3" align="center"><h2>CHỈNH SỬA TÀI KHOẢN</h2></td>
				</tr>
				<tr >
					<td align="center">Tên: </td>
					<td> <input type="text" name="c_name"value ="<?php echo $name; ?>"> </td>
				</tr>
				<tr>
					<td align="center">Email: </td>
					<td> <input type="text" name="c_email"value ="<?php echo $customer_email; ?>"> </td>
				</tr>
				<tr>
					<td align="center">Ảnh đại diện:  </td>
					<td> <input type="file" name="image" size="60"> <img src="product_images/<?php echo $image; ?>" alt=""style="width: 60px; height: 60px";> </td>
				</tr>
				<tr> 
					<td align="center" colspan="3"> <input type="submit" name="update_c" value ="Cập nhật"></td>
				</tr>
			</table>
		</form>
		<?php 

		if(isset($_POST['update_c']))
		{
			$update_id = $id;
			$c_name = $_POST['c_name'];
			$c_email = $_POST['c_email'];
			$u_image = $_FILES['image']['name'];
			$image_tmp = $_FILES['image']['tmp_name']; 
			

			$update = "UPDATE users SET name = '$c_name', email = '$c_email', image ='$u_image' where id = '$update_id'";

			move_uploaded_file($image_tmp,"product_images/$u_image");

			$run_c = mysqli_query($con,$update);
			if($run_c)
			{
					echo "<script> alert('Cập nhật thành công')</script>";
					echo "<script>window.open('taikhoan.php','_self')</script>";
			}
		}

		?>
	</div>
</div>


<div class="container">
	<div class="col-sm-12 push-sm-3">


		<form action="" method="post" accept-charset="utf-8">

			<table width="500" align ="center">
				<tr align ="center">
					<td colspan="4"><h2>THAY ĐỔI MẬT KHẨU</h2></td>
				</tr>	
				<tr>	
					<td align="center">Nhập mật khẩu hiện tại</td>
					<td> <input type="password" name="old_pass" required>  </td>
				</tr>
				<tr>
					<td align="center">Nhập mật khẩu mới</td>
					<td> <input type="password" name="new_pass" required> </td>
				</tr>
				<tr>
					<td align="center"> Nhập lại mật khẩu mới</td>
					<td> <input type="password" name="new_pass_again" required> </td>
				</tr>

				<tr align="center">
					<td colspan="4"> <input type="submit" name="change_pass" value="Thay mật khẩu"> </td>

				</tr>
			</table>
		</form>
	</div>
</div>

<?php 
include("db.php");
$customer_email = $_SESSION['email'];
$c = $_SESSION['email'];
if(isset($_POST['change_pass']))
{
	$old_pass = md5($_POST['old_pass']);
	$new_pass =md5( $_POST['new_pass']);
	$new_pass_again = md5($_POST['new_pass_again']);

	$get_real_pass = "select * from users where password = '$old_pass' ";

	$run_real_pass = mysqli_query($con, $get_real_pass);
	$check = mysqli_num_rows($run_real_pass);
	

	if($check == 0){
		echo "<script>alert('Mật khẩu không tồn tại')</script>";
		exit();
	}
	if($new_pass != $new_pass_again)
	{
		echo "<script>alert('Mật khẩu mới không trùng khớp')</script>";
		exit();
	}
	else {
		$update_pass = "UPDATE users set password ='$new_pass' where email = '$c' ";
		$run_pas = mysqli_query($con, $update_pass);
		echo "<script>alert('Mật khẩu của bạn đổi thành công')</script>";
		echo "<script>window.open('taikhoan.php','_self')</script>";
	}
}

?>
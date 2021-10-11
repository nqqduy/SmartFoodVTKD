<form action="" method="post" accept-charset="utf-8">
	<table align="center" width="1500">
		<tr align="center">
			<td colspan="1" align="center"><h2> BAN CÓ CHẮC CHẮN XÓA TÀI KHOẢN</h2> </td>
		</tr>		
		<tr align="center"> 
			<td align="center">
				<input type="submit" name="yes" value ="Ok, chắc chắn xóa">
			</td>
		</tr>
	</table>
</form>
<?php 

include("db.php");
$c = $_SESSION['email'];

if(isset($_POST['yes']))
{
	session_destroy();
	$delete = "DELETE from users where email = '$c'";

	$run = mysqli_query($con,$delete);

	if($run)
	{
		echo"<script>Oke, tài khoản của bạn đã xóa, hẹn gặp lại!</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}

?>
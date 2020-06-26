<?php 
	$con = mysqli_connect("localhost","root","","bk-food");
	if(mysqli_connect_errno()) {
		echo "Kết nối database bị lỗi!".mysqli_connect_error();
	}
?>
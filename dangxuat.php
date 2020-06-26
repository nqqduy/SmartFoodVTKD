<?php 
	session_start();

	session_destroy();
	echo "<script>alert('Đăng xuất thành công , hặn gặp lại bạn')</script>";
	echo "<script>window.open('index.php','_self')</script>";


 ?>
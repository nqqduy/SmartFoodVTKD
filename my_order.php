<?php 
include("db.php");
include("function.php");

$c = $_SESSION['email'];

$get_c = "SELECT * from users where email = '$c'";

$run_c = mysqli_query($con, $get_c);

$row_c = mysqli_fetch_array($run_c);

$customer_id = $row_c['id'];

?>
<table width="700" align="center">
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>	

</table>
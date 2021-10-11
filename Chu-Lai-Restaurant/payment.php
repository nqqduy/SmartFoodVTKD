<?php 
include("db.php");
include("function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Example </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />  
	<script type="text/javascript" src="vendor/bootstrap.js"></script>
	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="1.css">
	<link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.5.1.min.js">
</head>
<body >	
	<br>
	<div class="container">
		<br>
		<div class="row">
			<div class="col-sm-4">
				<a href="https://test-payment.momo.vn/gw_payment/transactionProcessor" title=""></a><p style="color:green; font-size: 20px;">Thanh toán online</p>
				<div class="logo-paypal text-center">
					<div id="paypal-button-container"></div>
					<?php  					
					$total = 0;

					$ip = get_ip();

					$run_cart = mysqli_query($con, "SELECT * from cart where ip_address='$ip' ");

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

							$usd = round( $total/23000, 1, PHP_ROUND_HALF_UP);

						}	   
					}?>
					Tổng giá : <?php echo $total." VNĐ = ".$usd." USD"; ?> <input type="radio" name ="amount" value="<?php echo $usd; ?>" onchange ="fun()">
					<!-- Include the PayPal JavaScript SDK -->
					<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

					<script>
						var total =0;
						function fun() {
							var amount = document.getElementsByName("amount");
							amount.forEach((element)=> {
								if(element.checked) {
									total = element.value;
								}

							});
						}
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
            	return actions.order.create({
            		purchase_units: [{
            			amount: {
            				value: total
            			}
            		}]
            	});
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
            	return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    console.log("result:", details)
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');               
                });
            }


        }).render('#paypal-button-container');
    </script>
</div>
</div>					
</div>
<br>
<?php 
$ip = get_ip();
$get_customer = "SELECT * FROM users where ip_address = '$ip'";
$run_customer = mysqli_query($con,$get_customer);
$customer = mysqli_fetch_array($run_customer);
$customer_id = $customer['id'];
?>
<div class="row">
	<div class="col-sm-4">
		<a href="order.php?c_id= <?php echo $customer_id; ?>" title=""><p style="text-decoration: none;font-size: 20px; color:green;">Đi đến tài khoản</p></a>
	</div>
</div>
</div>
</body>
</html>

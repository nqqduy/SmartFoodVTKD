<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DauBep</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">
  <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <meta name="msapplication-config" content="https://getbootstrap.com/docs/4.5/assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="https://getbootstrap.com/docs/4.5/examples/album/album.css" rel="stylesheet">

  
  </head>
  <body>

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong>BK SmartFood</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
            <h1>Xin Chào Đầu bếp !</h1>
            <p>
                <a href="./capnhatdonhang.php" class="btn btn-primary my-2">Cập nhật tình trạng đơn hàng</a>
                <br>
                <a href="./yeucaunguyenlieu.php" class="btn btn-success my-2">Yêu cầu nguyên liệu</a>
            </p>
            </div>
        </section>
    </main>

  </body>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© BK SmartFood</p>
    
  </footer>

</html>
-->
<?php
@session_start();
include("db.php");
error_reporting(0); 
///pagination
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title>Smart Food Court System  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="vendor/bootstrap.js"></script>
	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="1.css">
	<link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.5.1.min.js">
</head>
<body >
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center" style=" text-align: center;">
				<img src="img/logo.png" alt="" style="width: 100px;">
				<h1  style="color:red; text-align: center;">ĐẦU BẾP</h1>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 ">
				<table width="" align="center" bgcolor="" class="table-bordered table-active table" >
					<tr>
						<th class="duyy1" style="text-align: center;">Thứ tự đơn hàng</th>  
						<th class="duyy1" style="text-align: center;">Số hóa đơn</th>
						<th style="text-align: center;">Trạng thái</th>
						<th class="duyy1" style="text-align: center;">Tên khách hàng</th>
						<th class="duyy1" style="text-align: center;">Email</th>
					</tr> 
					<?php 
					$a = 0;
					$result=mysqli_query($con,"select order_id, due_amount, invoice_no, total_products, order_date, order_status, name, email from customer_order, users where customer_order.customer_id=users.id ")or die ("query 1 incorrect.....");

					while(list($order_id, $due_amount, $invoice_no, $total_products, $order_date, $order_status, $name, $email)=mysqli_fetch_array($result))
					{ 
						$a = $a+1;
						echo "<tr>
						<td style='text-align: center;'>$a</td>
						<td  style='text-align: center;'>$invoice_no</td>
						<td style='text-align: center;'>Đã Thanh toán</td>
						<td style='text-align: center;'>$name</td>
						<td style='text-align: center;'>$email</td>   
						<td> <a href='daubep.php?sansang=$invoice_no'> <button type='button' class='btn btn-success btn-sm'>Sẵn Sàng</button></a>
						</td></tr>
						<td> <a href='index.php?invoice_no=$invoice_no'> <button type='button' class='btn btn-success btn-sm'>Chi tiết</button></a>
						</td></tr>";    
					}
					?>
				</table>
				<?php 
				if(isset($_GET['sansang'])) { 
					$c =  $_GET['sansang'];
					$sql = "UPDATE customer_order SET status_chef ='Đã sẵn sàng' WHERE invoice_no ='$c'";
					if (mysqli_query($con, $sql)) {
						echo "<script>alert('Đã gửi cho khách hàng')</script>";
					}
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>
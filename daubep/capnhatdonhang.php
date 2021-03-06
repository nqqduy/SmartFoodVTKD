<?php 
include("connection.php");
session_start();
if(isset($_SESSION['processing']))
{
    $_SESSION['processing'] = 1;
}
else
{
    $_SESSION['processing'] = 0;
}  

if(isset($_SESSION['have_order'])) 
{ 
    if($_SESSION['have_order'] == 0)
    $_SESSION['processing'] = 0;
}
else 
{
    $_SESSION["have_order"] = 0;
}
if(isset($_SESSION['id_bf']) == FALSE) $_SESSION['id_bf'] = 'bk';
if(isset($_GET['id']) && ($_SESSION['id_bf'] != $_GET['id']))
{
    
    $_SESSION['processing'] = 0;
    $sql_dlt = "DELETE FROM don_hang WHERE Stt=".$_SESSION["row"]["Stt"];
    $sql_drop = "DROP TABLE ".$_SESSION["row"]["ID"];
    
    $bkfood_db->query($sql_dlt);
    $listorder_db->query($sql_drop);
    unset($_SESSION['result']);
    $_SESSION['id_bf'] = $_GET['id'];
} 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DauBep</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
      body {
        color: #404E67;
        background: #F5F7FA;
        font-family: 'Open Sans', sans-serif;
        }
        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;	
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
        .table-title .add-new i {
            margin-right: 4px;
        }
        table.table {
            table-layout: fixed;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table th:first-child {
            width: 100px;
        }
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }    
        table.table td a.add {
            color: #27C46B;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }    
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        table.table .form-control.error {
            border-color: #f50000;
        }
        table.table td .add {
            display: none;
        }
    </style>
    <!-- Custom styles for this template -->
    
  </head>
  <body class="bg-light">
        
   







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
    
    <main role="main" class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Thông tin đơn hàng</h6>
        <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <?php
                    
                    $sql = "SELECT * FROM don_hang WHERE Status='pending'";
                    
                    if(($_SESSION['processing'] == 0) || ($_SESSION['have_order'] == 0))
                    {

                            $_SESSION["result"] = $bkfood_db->query($sql);
                            if($_SESSION["result"]->num_rows > 0)
                            {    
                                
                                $_SESSION["row"] =  $_SESSION["result"]->fetch_assoc();
                                $_SESSION["have_order"] = 1;
                                $stt = $_SESSION["row"]["Stt"];
                                $sql1 = "UPDATE don_hang SET Status='processing' WHERE Stt='$stt'";
                                $bkfood_db->query($sql1);
                                
                               
                                
                            }
                            else
                            {
                                $_SESSION['have_order'] = 0;
                                
                               
                            }
                            
                            
                            
                    
                    
                    }
                    
                        
                    
                        
                    
                    
                    
                ?>
                <div class="table-title">
        
                    <div class="row">
                        <div class="col-sm-8"><h2>
                        <?php
                        if ($_SESSION['have_order'] == 1)
                        { 
                            echo "ID: ".$_SESSION["row"]["ID"];
                            
                        }
                        else echo "Hiện tại không có đơn hàng."
                        ?>
                        </h2></div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Số lượng</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        if($_SESSION["have_order"] == 1)
                        {
                            
                            
                            //
                            // if($bkfood_db->query($sql1) == TRUE)
                            // {
                            // }           
                            // else{
                            //     echo "Error updating record";

                            // }
                            $sql2 = "SELECT * FROM ".$_SESSION["row"]["ID"];
                            $result2 = $listorder_db->query($sql2);
                            if($result2->num_rows > 0)
                            {
                                while($row2 = $result2->fetch_assoc())
                                {
                                echo "<tr>
                                    <td>".$row2["stt"]."</td>
                                    <td>".$row2["Product_title"]."</td>
                                    <td>".$row2["Quantity"]."</td>                                    
                                    </tr>";
                                }
                            }
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
        <small class="d-block text-right mt-3">
            <!-- <a href="#" class="btn btn-success my-2">Hoàn thành</a>
            <a href="#" class="btn btn-danger my-2">Hủy bỏ</a> -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalReady">
                        Hoàn thành
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalCancel">
                        Hủy bỏ
            </button>
            
        </small>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalReady" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Bạn chắc chắn đơn hàng đã "sẵn sàng"?
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modalContinue">Chắc chắn</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modalCancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Bạn chắc chắn muốn "Hủy" đơn hàng?
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modalContinue">Chắc chắn</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
        </div>
        </div>
    </div>
    </div>                    
    
    <div class="modal fade" id="modalContinue" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Bạn có muốn thực hiện đơn hàng khác?
        </div>
        <div class="modal-footer">
            
            <a href="capnhatdonhang.php?processing=0&id=<?php echo $_SESSION["row"]["ID"]?>" class="btn btn-primary">Có</a>
            <a href="index.php" class="btn btn-secondary">Không</a>
        </div>
        </div>
    </div>
    </div>


    </main>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© BK SmartFood</p> 
    </footer>
    
</body>

</html>
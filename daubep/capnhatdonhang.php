
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DauBep</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>ID: 123</h2></div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Số lượng</th>
                            <th>Ghi chú</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Phở Lý Quốc Sư</td>
                            <td>2</td>
                            <td>không bỏ hành</td>
                            
                        </tr>
                        <tr>
                            <td>Bánh Mì Thịt</td>
                            <td>3</td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td>Pepsi</td>
                            <td>3</td>
                            <td></td>
                            
                        </tr>      
                    </tbody>
                </table>
            </div>
        </div>

        <small class="d-block text-right mt-3">
            <a href="#" class="btn btn-success my-2">Hoàn thành</a>
            <a href="#" class="btn btn-danger my-2">Hủy bỏ</a>
        </small>
    </div>

    </main>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© BK SmartFood</p> 
    </footer>
</body>
</html>

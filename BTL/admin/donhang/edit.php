
<?php
	include("../util.php");
	include("../lib_db.php");
	$id = $_REQUEST['id'];
	connect();
	$sql = "select a.*,b.ten_sp from chitiet_donhang a left join sanpham b on a.id_sp = b.id where a.id_donhang = ".$id;
	// lấy danh mục
	$details = select_list($sql);
	$sql = "select * from donhang where id = ".$id;
	// lấy danh mục
	$infor = select_one($sql);
	
	// if( strpos($product["size"],'29')) echo 'selected';
	if(isset($_POST['edit'])){
		$trangthai = $_POST['trangthai'];
		
		// khởi tạo
		$data=array();
		$data["trangthai"] = $trangthai;
		
		$tbl = "donhang";
        $cond = "id={$id}";
        //  print_r($cond);exit();
		$sql_update_product = data_to_sql_update($tbl, $data,$cond);
        //  print_r($sql_update_product);exit();
        $ret = exec_update($sql_update_product);
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kong Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>
<body style="">
    <!--nav-->
      <?php include("../block/block.header.php");?>
     <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <?php include("../block/block.left_menu.php");?>

          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class=" panel-title">
					<a class="btn btn-danger align-right" href="http://localhost/BTL/admin/donhang/">Quay lại</a> 
					<span>       Chi tiết đơn hàng</span>
				</h3>
              </div>
					<div class="row">
							<div class="col-lg-4" >
								<p style="margin:15px 0 0 10px"> Tên : <?=$infor['name']?></p>
								<p style="margin:15px 0 0 10px"> địa chỉ : <?=$infor['address']?></p>
								<p style="margin:15px 0 0 10px"> Điện thoại : <?=$infor['phone']?></p>
								<p style="margin:15px 0 0 10px"> Mail : <?=$infor['phone']?></p>
								<p style="margin:15px 0 0 10px"> Trạng thái : <?=$infor['trangthai']?></p>
								<p style="margin:15px 0 0 10px"> Tổng : <?=$infor['thanhtien']?></p>
							</div>
							<div class="col-lg-8">
							<!-- Advanced Tables -->
								<div class="panel panel-default">
									<div class="panel-heading">Danh sách đơn hàng</div>
										<div class="panel-body">
											<div class="table-responsive">
											<form action="" method="post">
												<table class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<td>STT</td>
														<td>Tên sp</td>
														<td>Size</td>
														<td> Màu </td>
														<td> SL </td>
													</tr>
													
												</thead>
												<tbody>
														<?php $i=1;
															foreach($details as $product){?>
														<tr>
															
															<td><?= $i?></td>
															<td> <?=$product['ten_sp']?></td> 
															<td> <?=$product['size']?></td> 
															<td> <?=$product['color']?></td> 
															<td><?=$product['sl']?> </td> 
														</tr>
																
												<?php $i++; }?>
																  
												</tbody>    
											</table>
											<div class="actcimen">
												<select name="trangthai" required>
													<option   >Chọn</option>
													<option  value="Mới tạo" >Mới tạo</option>
													<option value="Đã xủ lý" >Đã xủ lý</option>
													<option value="Hủy đơn" >Hủy đơn</option>
												</select>
												<input class="buttom" name="edit" value="Thực hiện" type="submit">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>      
            </div>
        </div><!-- content -->
      </div>
    </div>
  

</body>
</html>


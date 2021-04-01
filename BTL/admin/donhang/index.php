
<?php

	include("../util.php");
	include("../lib_db.php");
$where ="where 1 = 1 ";
	if(isset($_REQUEST["key"])){
		$key = $_REQUEST["key"];
		$where.=" and name like '%$key%'";
	}
	else $key="";
	
	if(isset($_POST['id'])){
		$id = array();
		$id=implode(",",$_POST['id']);
		$sql= "DELETE FROM `donhang` WHERE id in ($id)";
		exec_update($sql);
		
		$sql= "DELETE FROM `chitiet_donhang` WHERE id_donhang in ($id)";
		exec_update($sql);
		header("Location:index.php");
	}

	connect();
	$sql = "select * from `donhang` ".$where;
	$products = select_list($sql);
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
					<h3 class=" panel-title"><a class="btn btn-danger align-right" href="http://localhost/BTL/admin/product/add.php">Thêm mới<i class="fa fa-plus"></i></a></h3>
					
				  </div>
					 <div class="col-md-12 text-center" >
						<form name="adminForm" method="post" action="" accept-charset="utf-8">
							<input style="width: 60%;height: 33px;border-radius: 5px;" value="<?= $key?>" class="input" name="key" placeholder="Nhập tên bài viết mà bạn muốn tìm...">
						   <input class="btn btn-warning" value="Tìm kiếm" type="submit"> 
					   </form>        
				  </div>
					<div class="row">
						<div class="col-lg-12">
						<!-- Advanced Tables -->
							<div class="panel panel-default">
								<div class="panel-heading">Danh sách đơn hàng</div>
									<div class="panel-body">
										<div class="table-responsive">
										<form action="" method="post">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<td width="15px"><span><input type="checkbox" name="checkAll" id="checkAll"></span></td>
													<td>STT</td>
													<td>Tên</td>
													<td>mail</td>
													<td> SĐT </td>
													<td> Chú thích</td>
													<td>Trạng thái </td>
													<td>Tổng tiền </td>
													<td>Thao tác </td>
												</tr>
												
											</thead>
											<tbody>
													<?php $i=1;
														foreach($products as $product){?>
													<tr>
														<td><span><input type="checkbox" name="id[]" value="<?= $product['id']?>"></span></td>
														<td><?= $i?></td>
														<td> <?=$product['name']?></td> 
														<td> <?=$product['mail']?></td> 
														<td> <?=$product['phone']?></td> 
														<td> <?=$product['note']?></td> 
														<td> <?=$product['trangthai']?></td> 
														<td><?=$product['thanhtien']?><td>
															<a title="xem" href="edit.php?id=<?= $product['id']?>"> <i class="fa fa-eye"></i></a> | 
															<a href="delete.php?id=<?= $product['id']?>"><i class="fa fa-trash"></i></a> 
														   
														 </td>
													</tr>
															
											<?php $i++; }?>
															  
											</tbody>    
										</table>
										<div class="actcimen">
											<input class="buttom" name="delete" value=" Xóa mục đã chọn" type="submit">
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
<script language="JavaScript">
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</html>


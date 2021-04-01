
<?php
	include("../util.php");
	include("../lib_db.php");
	connect();
	$sql = "select * from danhmuc ";
	// lấy danh mục
	$categories = select_list($sql);
	
	if(isset($_POST['add'])){
		/*
		echo $a = implode(',',$_POST['color']);
		print_r(explode(',',$a));
		die;*/
		//print_r($_POST);die;
		
		// lấy ảnh
		
		$img = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image") : "";
		$img1 = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image1") : "";
		$img2 = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image2") : "";
		$img3 = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image3") : "";
		// lấy thông tin 
		$ma_sp = $_REQUEST['ma_sp'];
		$ten_sp = $_REQUEST['ten_sp'];
		$id_dm = $_REQUEST['id_dm'];
		$size = implode(',',$_POST['size']);
		$color = implode(',',$_POST['color']);
		$gia_bandau = $_REQUEST['gia_bandau'];
		$gia_ban = $_REQUEST['gia_ban'];
		$noibat = (isset($_REQUEST['noibat'])) ? 1 : 0;
		$mota = $_REQUEST['mota'];
		
		// khởi tạo
		$data=array();
		$data["id"] = NULL;
        $data["ma_sp"] =$ma_sp; 
		$data["ten_sp"] =$ten_sp;
        $data["id_danhmuc"] =$id_dm;
        $data["size"] =$size;
        $data["color"] =$color;
        $data["gia_bandau"] =$gia_bandau;
        $data["gia_ban"] =$gia_ban;
        $data["noibat"] = $noibat;
		$data["mota"] = $mota;
		$data["image"] = $img;
		$data["image1"] = $img1;
		$data["image2"] = $img2;
		$data["image3"] = $img3;
		
		// chèn vào
		$sql_insert_product = data_to_sql_insert("sanpham", $data);
		$ret = exec_update($sql_insert_product);
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

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
					<a class="btn btn-danger align-right" href="http://localhost/BTL/admin/product/">Quay lại</a> 
					<span>       Quản lý sản phẩm</span>
				</h3>
              </div>
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						  ﻿<form name="adminForm" class="" method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8" style="margin-bottom:10px">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-3"> MÃ Sp</label>
										<input class="col-md-9" name="ma_sp" required>
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-3"> Tên Sp</label>
										<input class="col-md-9" name="ten_sp" required>
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-3"> Danh mục</label>
										<select class="col-md-9 select" name="id_dm" required style="width:75%">
											<option> -Chọn-</option>
											<?php foreach($categories as $key){?>
												<option value="<?= $key['id']?>"> <?php if($key['parent'] > 0) echo "--"; echo "-- ".$key['ten']?></option>
											<?php }?>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-3">Hình ảnh đại diện</label>
										<input class="col-md-9" type="file" name="image" required>
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-3">Size</label>
										<select name="size[]" class="col-md-9 select"  multiple style="width:75%" required>
											<option value="X">X</option>
											<option value="L">L</option>
											<option value="S">S</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
											<option value="32">32</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-3">Màu sắc</label>
										<select name="color[]" class="col-md-9 select"  multiple style="width:75%" required>
											<option value="Xanh">Xanh</option>
											<option value="Đỏ">Đỏ</option>
											<option value="Tím">Tím</option>
											<option value="Vàng">Vàng</option>
										</select>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-md-3">Giá ban đầu</label>
										<input class="col-md-9" name="gia_bandau">	
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-3">Giá bán</label>
										<input class="col-md-9" name="gia_ban" required>	
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-3">Mô tả</label>
										<textarea rows="8" cols="50" class="col-md-12" name="mota" required></textarea>	
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-12">
											<input type="checkbox" name="noibat"> Sản phẩm Nổi bật
										</label>
										
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-4">Hình ảnh liên quan 1</label>
										<input class="col-md-8" type="file" name="image1" >
											
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-4">Hình ảnh liên quan 2</label>
										<input class="col-md-8" type="file" name="image2" >
											
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-4">Hình ảnh liên quan 3</label>
										<input class="col-md-8" type="file" name="image3" >
											
									</div>
									
									<div class="col-md-12 text-center">
										<input class="btn btn-success" type="submit" name="add" value="Thêm mới"/>
									</div>
								</div>
						  </form> 
					</div>
				</div>
			</div>      
          </div>
       </div>
     </div>
</body>
<script language="JavaScript">

$('.select').select2();

$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</html>


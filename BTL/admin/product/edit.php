
<?php
	include("../util.php");
	include("../lib_db.php");
	$id = $_REQUEST['id'];
	connect();
	$sql = "select * from danhmuc ";
	// lấy danh mục
	$categories = select_list($sql);
	
	
	$sql = "select * from sanpham where `id` =".$id;
	$product = select_one($sql);
	
	$product["color"] = "(".$product["color"].")";
	$product["size"] = "'".$product["size"]."'";
	
	// if( strpos($product["size"],'29')) echo 'selected';
	if(isset($_POST['edit'])){
		/*
		echo $a = implode(',',$_POST['color']);
		print_r(explode(',',$a));
		die;*/
		//print_r($_POST);die;
		
		// lấy ảnh
		
		$img = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image") : $product["image"];
		$img1 = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image1") : $product["image1"];
		$img2 = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image2") : $product["image2"];
		$img3 = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image3") : $product["image3"];
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
		
		$tbl = "sanpham";
        $cond = "id={$product['id']}";
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
							<input class="col-md-9" name="ma_sp" value="<?= $product["ma_sp"]?>" required>
						</div>
						<div class="form-group col-md-6">
							<label class="col-md-3"> Tên Sp</label>
							<input class="col-md-9" value="<?= $product["ten_sp"]?>" name="ten_sp" required>
						</div>
						<div class="form-group col-md-6">
							<label class="col-md-3"> Danh mục</label>
							<select class="select" name="id_dm" style="width:75%" required>
								<option> -Chọn-</option>
								<?php foreach($categories as $key){?>
									<option  <?php if($product["id_danhmuc"] == $key['id']) echo 'selected'?> value="<?= $key['id']?>"> <?php if($key['parent'] > 0) echo "--"; echo "-- ".$key['ten']?></option>
								<?php }?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label class="col-md-3">Hình ảnh đại diện</label>
							<input class="col-md-9" type="file" name="image" >
						</div>
						<div class="form-group col-md-6">
							<label class="col-md-3">Size</label>
							<select name="size[]" class="col-md-9 select"  multiple style="width:75%" >
								<option <?php if(strpos($product["size"],'X')) echo 'selected'?> value="X">X</option>
								<option <?php if($product["size"] != "'NULL'") {if(strpos($product["size"],'L')) echo 'selected';}?> value="L">L</option>
								<option <?php if(strpos($product["size"],'S')) echo 'selected'?> value="S">S</option>
								<option <?php if(strpos($product["size"],'28')) echo 'selected'?> value="28">28</option>
								<option <?php if(strpos($product["size"],'29')) echo 'selected'?> value="29">29</option>
								<option <?php if(strpos($product["size"],'30')) echo 'selected'?> value="30">30</option>
								<option <?php if(strpos($product["size"],'31')) echo 'selected'?> value="31">31</option>
								<option <?php if(strpos($product["size"],'32')) echo 'selected'?> value="32">32</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label class="col-md-3">Màu sắc</label>
							<select name="color[]" class="col-md-9 select"  multiple style="width:75%" required>
								<option <?php if( strpos($product["color"],'Xanh')) echo 'selected'?> value="Xanh">Xanh</option>
								<option <?php if( strpos($product["color"],'Đỏ')) echo 'selected'?> value="Đỏ">Đỏ</option>
								<option <?php if( strpos($product["color"],'Tím')) echo 'selected'?> value="Tím">Tím</option>
								<option <?php if( strpos($product["color"],'Vàng')) echo 'selected'?> value="Vàng">Vàng</option>
							</select>
						</div>
						
						<div class="form-group col-md-6">
							<label class="col-md-3">Giá ban đầu</label>
							<input class="col-md-9" name="gia_bandau" value="<?= $product["gia_bandau"]?>" >	
						</div>
						<div class="form-group col-md-6">
							<label class="col-md-3">Giá bán</label>
							<input class="col-md-9" name="gia_ban" value="<?= $product["gia_ban"]?>" required>	
						</div>
						<div class="form-group col-md-6">
							<label class="col-md-3">Mô tả</label>
							<textarea rows="8" cols="50" class="col-md-12" name="mota" required><?= $product["mota"]?></textarea>	
						</div>
						<div class="form-group col-md-6">
							<label class="col-md-12">
								<input <?php if($product["noibat"] == 1) echo "checked";?>  type="checkbox" name="noibat"> Sản phẩm Nổi bật
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
							<input class="btn btn-success" type="submit" name="edit" value="Cập nhật"/>
						</div>
					</div>
			  </form> 
            
        </div>
	</div>
</div>      
            </div>
        </div><!-- content -->
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


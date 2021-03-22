
 <?php
 include("lib_db.php");
 session_start();
 if(isset($_POST['submit'])){
	// print_r($_POST);die;
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$note = $_POST['note'];
	$thanhtien = $_POST['thanhtien'];
	// khởi tạo
	$data=array();
	$data["id"] = NULL;
	$data["name"] =$name; 
	$data["mail"] =$mail;
	$data["phone"] =$phone;
	$data["note"] =$note;
	$data["address"] =$address;
	$data["thanhtien"] =$thanhtien;
	$data["trangthai"] ="Mới tạo";

	$sql_insert_product = data_to_sql_insert("donhang", $data);
	$ret = exec_update($sql_insert_product);
	if($ret  =1 ){
		$sql = "select * from donhang order by id desc limit 1";
		$donhang = select_one($sql);
		foreach($_SESSION['orderCart'] as $key){
				$data=array();
				$data["id"] = NULL;
				$data["id_donhang"]= $donhang['id'];
				$data["id_sp"] =$key['id']; 
				$data["sl"] =$key['sl'];
				$data["color"] =$key['color'];
				$data["size"] =$key["size"];
				$sql_insert_product = data_to_sql_insert("chitiet_donhang", $data);
				$ret = exec_update($sql_insert_product);
				unset($_SESSION['orderCart'][$key['id']]);
		}
	}
	header("location:index.php");
	 
 }
 
 
 
 // lấy đơn hàng
		
	$sl = 0;
	$tong=0;
	// get product
	if(isset($_SESSION['orderCart'])){
		$id = implode(',',array_keys($_SESSION['orderCart']));
		//unset($_SESSION['orderCart']);
		$products = array();
		if(count($_SESSION['orderCart'])>0){
		$sql = "select * from sanpham where id in ({$id})";
		$products = select_list($sql);
		}
		
		foreach($_SESSION['orderCart'] as $key){
			$sl  += $key['sl'];
			$tong += $sl*$key['price'];
		}
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
  <script src="js/js.cart.js"></script>
  <script src="js/js.chung.js"></script>
  <link rel="stylesheet" href="css/home.css">
   <link rel="stylesheet" href="css/details_product.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>

</style>
</head>
<body>     
  
    <!--header-->
	<?php require('block/block.header.php')?>
	

    <!--end header--> 
    <div class="nearheader"></div>
   
  <div class="container details">
	<div class="row ">
		<div class="col-md-5">
				<div class="header_detail">
					<h1 style=""> <b>Thông tin của bạn</b></h1>
				</div>
				<form class="form_add_cart" action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
						<div class="col-md-12">
							<label class="col-md-3"> Họ tên</label>
							<input placeholder="Họ và tên" name="name" class="col-md-12" style="padding: 5px 0; margin-left:15px " required>
						</div>
						<div class="col-md-12">
							<label class="col-md-3"> Mail</label>
							<input type="mail" placeholder="Email" name="mail" class="col-md-12" style="padding: 5px 0; margin-left:15px " required>
							
						</div>
						<div class="col-md-12">
							<label class="col-md-3"> Điện thoại</label>	
							<input placeholder="Điện thoại" name="phone" class="col-md-12" style="padding: 5px 0; margin-left:15px " required>
						</div>
						<div class="col-md-12">
							<label class="col-md-3"> Địa chỉ</label>
							<input placeholder="Địa chỉ" name="address" class="col-md-12" style="padding: 5px 0; margin-left:15px " required>
						</div>
						<div class="col-md-12">
							<label class="col-md-6"> Hình thức thanh toán</label>
							<select name="hinhthuc"  class="col-md-12" style="padding: 5px 0; margin-left:15px " required>
								<option value="0">Thanh toán khi nhận hàng</option>
								<option value="1">Thanh toán Banking</option>
							</select>
							</div>
						<div class="col-md-12">
							<label class="col-md-3"> Ghi chú</label>
							<textarea class="col-md-12" name="note" rows="5" style="padding: 5px 0; margin-left:15px;border-radius: 5px;  "></textarea>
						</div>
						<input type="hidden" id="thanhtien" name="thanhtien" value="<?= $tong?>">
						<button  name="submit"  class="btn btn-danger "style="margin-top:15px;">Đặt Hàng</button>	
				</form>
		</div>

		<div class="col-md-7">
			<div class="header_detail">
				<h1 style=""> <b>Danh sách giỏ hàng của bạn: <?= count($products)?> sản phẩm</b></h1>
			</div>
				<?php if(count($products)>0){?>
				<div class="mini-cart-body">
					<ul style="text-align: left;list-style:none;padding:0 3%;">
					<?php foreach($products as $key ){?>
						<li class="row" style="margin-top: 5px;border-bottom: 1px dotted #dfe0e1;">
							<img class="col-md-3" src="<?= $key['image']?>" >
							<div class="col-md-7">
								<p class="col-md-12">
									<b><?= $key['ten_sp']?></b> </br> <?=$_SESSION['orderCart'][$key['id']]['color']?>/<?=$_SESSION['orderCart'][$key['id']]['size']?>
									</br><span style="color:red;"><?= number_format($key['gia_ban'],0,"",".")?>Đ</span>
								</p>
								<a onclick="updown('down',<?= $key['id']?>,<?= $key['gia_ban']?>)" class="btn btn-defaut col-md-1"><i class="fa fa-minus "></i></a>
									<input readonly id="quantity<?= $key['id']?>" class=" text-center col-md-2" value="<?=$_SESSION['orderCart'][$key['id']]['sl']?>" style="padding: 5px 0;width:10%">
								<a  onclick="updown('up',<?= $key['id']?>,<?= $key['gia_ban']?>)"  class="btn btn-defaut col-md-1"><i class="fa fa-plus"></i></a>	
								<p class="col-md-7" id="price<?= $key['id']?>"  style="text-align:right;color:red"><?=number_format($_SESSION['orderCart'][$key['id']]['sl']*$key['gia_ban'],0,"",".")?>Đ</p>
							</div>
							
							<a onclick="deletecart(<?= $key['id']?>)" href="" class="col-md-2 btn" style="float:right;color:red"><b>X</b></a>
						</li>
					<?php }?>
						
					</ul>
				</div>
				<?php }?>
				<div class="header_detail text-center">
					<h1 style=""> <b id="tong">Tổng: <?= number_format($tong,0,"",".") ?></b></h1>
			</div>
		</div>
		
	</div>
  </div>
  <script>
		
  </script>
    <div class="clearfix"></div>
    
  <?php require("block/block.footer.php")?>

</body>
</html>
<style>

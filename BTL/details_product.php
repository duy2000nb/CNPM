
 <?php
 //include("lib_db.php");
		 include("lib_db.php");
		$id = $_REQUEST['id_sp'];
		$sql = "select * from sanpham where id = ".$id;
		$product = select_one($sql);
		
		
		
		//sản phẩm liên quan
		$sql = "select * from sanpham where  id != ".$id." and id_danhmuc = ".$product['id_danhmuc']." order by id desc limit 0,4";
		$sp_lienquan = select_list($sql);
		
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
  <script src="js/js.details.js"></script>
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
		<div class="col-md-1">
			<img onclick="zoom(0)" id="0" class="banner btn" src="<?= $product['image']?>" style="max-width:150%">
			<?php for($i = 1; $i<4;$i++ ){
				if($product['image'.$i]){?>
					<img onclick="zoom(<?= $i?>)" id="<?= $i?>" class="banner btn" src="<?= $product['image'.$i]?>" style="max-width:150%">
				<?php }
				}?>
		</div>
		<div class="col-md-6">
			<img class="banner"  id="image" src="<?= $product['image']?>" style="max-width:100%">
		</div>
		
		<div class="col-md-5">
			<div class="header_detail">
				<h1 style=""> <b><?= $product['ten_sp']?></b></h1>
				<span>SKU: <?= $product['ma_sp']?></span>
			</div>
			<div class="price_detail">
			<?php if($product['gia_bandau']>0){?>
				<span class="btn btn-success">-<?= number_format(($product['gia_bandau'] - $product['gia_ban'])/$product['gia_bandau']*100,0,",",",")?>%</span>
				<span class="pro-price"><?= number_format($product['gia_ban'],0,",",",")?>₫</span>
				<del><?= number_format($product['gia_bandau'],0,",",",")?>₫</del>
			<?php } else{
				?>
				<span class="pro-price"><?= number_format($product['gia_ban'],0,",",",")?>₫</span>
			<?php }?>
			</div>
			<form class="form_add_cart">
				<?php if($product['size']!="NULL"){
						$size = explode(',',$product['size']);?>
					<div class="col-md-12">
						<label class="col-md-3"> Chọn size</label>
						<select  value="" id="size" class="col-md-12" style="padding: 5px 0; margin-left:15px " required>
							<option  value=""> Chọn</option>
							<?php for($i = 0; $i < count($size) ;$i++){?>
								<option value="<?= $size[$i]?>" select="selected"> <?= $size[$i]?></option>
							<?php }?>
						</select>
					</div>
				<?php } if($product['color'] !="NULL"){
						$color = explode(',',$product['color']);?>
					<div class="col-md-12">
						<label class="col-md-3"> Chọn màu</label>
						<select id="color" class="col-md-12" style="padding: 5px 0; margin-left:15px" required >
							<option  value=""> Chọn</option>
							<?php for($i = 0; $i < count($color) ;$i++){?>
								<option value="<?= $color[$i]?>" select="selected"> <?= $color[$i]?></option>
							<?php }?>
						</select>
					</div>
				<?php }?>
					<div class="col-md-12">
						<label class="col-md-3"> Số lượng</label>
						<a onclick="updown('down')" class="btn btn-defaut"><i class="fa fa-minus "></i></a>
							<input id="quantity" class=" text-center" value="1" style="padding: 5px 0;width:10%">
						<a  onclick="updown('up')"  class="btn btn-defaut"><i class="fa fa-plus"></i></a>				
					</div>
					<a onclick="addcart(<?=$product['id']?>,<?=$product['gia_ban']?>)" class="btn btn-danger ">Thêm vào giỏ</a>	
			</form>
			<div class="header_detail">
				<h1 style=""> <b>Mô tả</b></h1>
				<span><?= $product['mota']?></span>
			</div>
		</div>
	</div>
  </div>
  <script>

  </script>
	<div class="container"> 
		<div class="row ">
				<div class="danh-muc col-sm-12">
						<h2><b>Sản phẩm liên quan</b></h2>
				</div>
			</div><!--End Title-->

			<div class="clearfix"></div>
        <div class="row ">
		<?php if(count($sp_lienquan) ==0 ){?>
			<div class="row text-center">
				<a href="index.php" class="btn btn-success">Quay về trang chủ<a>
		</div>
		<?php }else{?>
		<?php foreach($sp_lienquan as $key){?>
            <div class="san-pham col-sm-4 col-xs-6 col-md-3 text-center">
                <a href="details_product.php?id_sp=<?=$key['id']?>">
                <img class="banner" src="<?=$key['image']?>">
                </a>
                <a href="#"><?=$key['ten_sp']?></a>
                <p><b><?= number_format($key['gia_ban'],0,",",",")?>₫</b></p>
            </div>
		<?php }
		}?>
        </div>
    </div>
	
	<div class="clearfix"></div>
    
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    
  <?php require("block/block.footer.php")?>

</body>
</html>
<style>

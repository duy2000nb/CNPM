
<?php
session_start();

	
$id = trim($_REQUEST["id"]);
$type = trim($_REQUEST['type']);

switch ($type) {
	case 'add':
		$sl = (trim($_REQUEST["sl"]) != '' && trim($_REQUEST["sl"]) != 'undefined') ? trim($_REQUEST["sl"]) : 1;
		$size = (trim($_REQUEST["size"]) != '' && trim($_REQUEST["size"]) != 'undefined') ? trim($_REQUEST["size"]) : 1;
		$color = (trim($_REQUEST["color"]) != '' && trim($_REQUEST["color"]) != 'undefined') ? trim($_REQUEST["color"]) : 1;
		$price = (trim($_REQUEST["price"]) != '' && trim($_REQUEST["price"]) != 'undefined') ? trim($_REQUEST["price"]) : 1;
		if ($id != '') {
			if (!isset($_SESSION['orderCart'])) {
				$_SESSION['orderCart'] = array();
			}
			if (!isset($_SESSION['orderCart'][$id])) {
				$_SESSION['orderCart'][$id] = array();
			}
			$_SESSION['orderCart'][$id]['id'] = $id;
			$_SESSION['orderCart'][$id]['sl'] += $sl;
			$_SESSION['orderCart'][$id]['size'] = $size;
			$_SESSION['orderCart'][$id]['color'] = $color;
			$_SESSION['orderCart'][$id]['price'] = $price;
			
		}
		break;
		case 'edit':
		$sl = (trim($_REQUEST["sl"]) != '' && trim($_REQUEST["sl"]) != 'undefined') ? trim($_REQUEST["sl"]) : 1;
		if ($id != '') {
			if (!isset($_SESSION['orderCart'])) {
				$_SESSION['orderCart'] = array();
			}
			if (!isset($_SESSION['orderCart'][$id])) {
				$_SESSION['orderCart'][$id] = array();
			}
			$_SESSION['orderCart'][$id]['sl'] = $sl;
			
		}
		break;
	case 'delete':
		if ($id != '') {
			unset($_SESSION['orderCart'][$id]);
		}
		break;
}
	include("../lib_db.php");

	$products= array();
	// get product
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


<div class="col-sm-2 col-xs-1 text-right mini-cart" id="mini-cart">
	<a href="cart.php">
		<i class="glyphicon glyphicon-shopping-cart" style="font-size:24px"><p class="number_cart"><?= $sl?></p></i>
		
		<div class="btn_hover1" >
			
				<div class="mini-cart-header"  style="padding: 5% 3% 0 3%; background-color: #9d9f9d;">
					<div class="row">
						<p class="col-md-6" style="text-align:left;"> <?= count($products)?> sản phẩm</p>
						<?php if($tong>0){?>
							<p class="col-md-6" style="color:red;"> <?= number_format($tong,0,"",".")?>Đ</p>
						<?php }?>
						<input type="hidden" id="total_cart" value="<?= $tong?>">
					</div>
				</div>
			<?php if(count($products)>0){?>
				<div class="mini-cart-body">
					<ul style="text-align: left;list-style:none;padding:0 3%;">
					<?php foreach($products as $key ){?>
						<li class="row" style="margin-top: 5px;border-bottom: 1px dotted #dfe0e1;">
							<img class="col-md-3" src="<?= $key['image']?>" >
							<p class="col-md-7">
								<b><?= $key['ten_sp']?></b> - <?=$_SESSION['orderCart'][$key['id']]['color']?>/<?=$_SESSION['orderCart'][$key['id']]['size']?>
								</br><?=$_SESSION['orderCart'][$key['id']]['sl']?>x<span style="color:red;"><?= number_format($key['gia_ban'],0,"",".")?>Đ</span>
							</p>
							<a onclick="deletecart(<?= $key['id']?>)" class="col-md-2 btn" style="float:right;color:red"><b>X</b></a>
						</li>
					<?php }?>
						
					</ul>
				</div>
				<a href="cart.php" class="btn btn-success  col-md-12" style="margin: 0;padding: 5px;"> Xem giỏ hàng </a>
				<?php }?>
		</div>
	</a>
</div>
	
<?php
	$where = " where noibat = 1 ";
	if(isset($_REQUEST['id'])){
		$where .= " and (id_danhmuc = ".$id." or id_danhmuc in (select id from danhmuc where parent = {$id}))";
	}
	 $sql = "select * from sanpham ".$where ." order by id desc limit 0,4";
	 $hots= select_list($sql);
	
?>

<?php if(count($hots) > 0){?>
	<div class="container">
			<!--Title-->
			<div class="row ">
				<div class="danh-muc col-sm-12">
					<a href="#"  class="danhmuc ">
						<h2><b>Sản Phẩm Đang HOT</b></h2>
					</a>
				</div>
			</div><!--End Title-->

			<div class="clearfix"></div>
			<!--Sản phẩm-->
			<div class="row ">
			<?php foreach($hots as $key ){?>
				<div class="san-pham col-sm-4 col-xs-6 col-md-3 text-center">
					<a class="a_hover" href="details_product.php?id_sp=<?= $key['id']?>" >
						<img class="banner" src="<?= $key['image']?>">
					</a>
					<a href="details_product.php?id_sp=<?= $key['id']?>"><?= $key['ten_sp']?></a>
					<p>
					<del> <?php if($key['gia_bandau']>$key['gia_ban']) echo number_format($key['gia_bandau'],0,'','.')."₫"?></del>
					<b><?= number_format($key['gia_ban'],0,'','.')?>₫</b></p>
						<!--div class="btn_hover" >
							<div class="btn btn-success col-sm-6">
								<a  data-toggle="modal" data-target="#myModal"> Xem Nhanh</a>
							</div>
							<div class="btn btn-danger col-sm-6">
								<a>Chi tiết</a>
							</div>
						</div-->
				</div>
			<?php }?>
			</div>
		</div>
<?php }?>


<?php
$where = " where 1 = 1 ";
	if(isset($_REQUEST['id'])){
		$where .= " and id_danhmuc = ".$id." or id_danhmuc in (select id from danhmuc where parent = {$id})";
		// phân trang
	$page = 1;
	if(isset($_REQUEST['page'])){
		$page = $_REQUEST['page'];
	}
	$page_from = ($page-1)*8;
	$page_to = $page*8;
	$limit = "". $page_from .",". $page_to;
	$sql = "select * from sanpham ".$where ." order by id desc limit ".$limit;
	 $products= select_list($sql);
	 
	 // lấy tổng
	 $sql = "select count(*)/8 a from sanpham ".$where;
	 $count= select_one($sql);
	// echo $count['a'];
	}
	if(isset($_REQUEST['key'])){
		$where .= " and ten_sp like '%{$_REQUEST['key']}%'";
		$sql = "select * from sanpham ".$where ." order by id desc ";
		$products= select_list($sql);
	}
	

?>

<div class="container"> 
		<div class="row ">
				<div class="danh-muc col-sm-12">
					<a href="#"  class="danhmuc ">
						<h2><b> <?php if(isset($_REQUEST['key'])) echo "Tìm kiếm Theo: ".$_REQUEST['key'];else echo"Danh Sách Sản Phẩm";?></b></h2>
					</a>
				</div>
			</div><!--End Title-->
		<?php if(count($products) ==0 ){?>
			<div class="row text-center">
				<a href="index.php" class="btn btn-success">Quay về trang chủ<a>
		</div>
		<?php }else{?>
			<div class="clearfix"></div>
        <div class="row ">
            <?php foreach($products as $key ){?>
				<div class="san-pham col-sm-4 col-xs-6 col-md-3 text-center">
					<a class="a_hover" href="details_product.php?id_sp=<?= $key['id']?>" >
						<img class="banner" src="<?= $key['image']?>">
					</a>
					<a href="details_product.php?id_sp=<?= $key['id']?>"><?= $key['ten_sp']?></a>
					<p>
					<del> <?php if($key['gia_bandau']>$key['gia_ban']) echo number_format($key['gia_bandau'],0,'','.')."₫"?></del>
					<b><?= number_format($key['gia_ban'],0,'','.')?>₫</b>
					
					</p>
						
				</div>
			<?php }?>
        </div>
		
		<div class="clearfix"></div>
		<?php if(!isset($_REQUEST['key'])){?>
		<div class="row text-center">
			<?php if($page > 1 ){?>
				<a href="?id=<?=$id?>&page=<?= $page - 1?>" class="btn btn-defaut">Preview<a>
			<?php } for($i = $page - 1; $i <= $page+1;$i++ ){
				if($i == $page )echo'<a class="btn btn-success">'.$page.'<a>';
				else if($i > 0 and $i <= ($count['a']+0.9)) echo '<a href="?id='.$id.'&page='.$i.'" class="btn btn-defaut">'.$i.'<a>';
				 }
				 if($page < $count['a']){?>
				<a href="?id=<?=$id?>&page=<?=$page+1?>" class="btn btn-defaut">Next<a>
				 <?php }?>
		</div>
		<?php }}?>
    </div>
	
	<div class="clearfix"></div>
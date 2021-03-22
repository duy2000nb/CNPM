

<?php

	 $sql = "select * from danhmuc where parent = 0";
	 $dads= select_list($sql);
	  $sql = "select * from danhmuc where parent > 0";
	 $childrens= select_list($sql);
	
?>
<div class="container">

	<?php foreach($dads as $dad){
		$sql = "select * from sanpham where noibat = 1 and (id_danhmuc = {$dad['id']} or id_danhmuc in (select id from danhmuc where parent = {$dad['id']})) order by id desc limit 0,4";
		$hots= select_list($sql);
		if(count($hots)>0){
		?>
		
        <div class="row ">
            <div class="danh-muc col-sm-12">
               <h1 style="float:left"> <a href="categories.php?id=<?=$dad['id']?>" class="danhmuc hidden-xs"><b><?= $dad['ten']?></b> </a></h1>
			   <?php foreach($childrens as $children){
				   if($dad['id'] ==$children['parent'] ){?>
				<p class="danhmuc-con hidden-xs" >&nbsp;&nbsp;<a href="categories.php?id=<?= $children['id']?>"><?= $children['ten']?></a></p>
				   <?php } }?>
            </div>
        </div>

        <div class="clearfix"></div>
        
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
						
				</div>
			<?php }?>
        </div>
		<?php }}?>
    </div>
	
	<div class="clearfix"></div>
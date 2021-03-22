 <?php
// include("lib_db.php");
$sql = "select * from banner";
		$image = select_list($sql);
if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		$sql = "select * from danhmuc where id = ".$id;
		$image = select_one($sql);
		?>
		
		<div class="container">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- hiển thị banner -->                                                     
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $image['image']?>" alt="<?= $image['ten']?>" style="width:100%;">
                </div>
            </div>
        </div>
    </div>
<?php		
 }else{ 
 ?>
 <div class="container">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- hiển thị banner -->                                                     
            <div class="carousel-inner">
			<?php 
				$i=0;
			foreach($image as $key){?>
                <div class="item <?php if($i==0) echo "active"?>">
                    <img src="<?= $key['image']?>" alt="" style="width:100%;">
                </div>
			<?php $i++;}?>
                
            </div>
            <!--điều hướng chuyển banner-->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
	
<?php  }?>
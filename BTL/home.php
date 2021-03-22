<?php
	include("lib_db.php");
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
  <link rel="stylesheet" href="css/home.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="js/js.chung.js"></script>
  <style>

</style>
</head>
<body>     
  
    <!--header-->
	<?php require('block/block.header.php')?>
    <!--end header--> 
    <div class="nearheader"></div>
   
    <!--banner-->
	<?php require('block/block.banner.php')?>
   <!--end banner-->
    
    <div class="clearfix"></div>
     <!--Mới về-->                       
		<?php require('block/block.newProduct.php')?>
    <div class="clearfix"></div>

	<?php require('block/block.Home_product_categories.php');?>
    
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    
  <?php require("block/block.footer.php")?>

</body>
</html>
<style>

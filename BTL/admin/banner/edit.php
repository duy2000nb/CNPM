
<?php
	include("../util.php");
	include("../lib_db.php");
	connect();
	$id = $_REQUEST['id'];
	$sql = "select * from banner where `id` =".$id;
	$category = select_one($sql);
	
	if(isset($_POST['edit'])){
		$img = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image") : $category['image'];
		$name = $_REQUEST['name'];
		$parent = $_REQUEST['parent'];
		// chèn vào
		echo $sql = "update `banner` set 
									  image = '$img' 
								 where id = ".$id;
		exec_update($sql);
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
                <h3 class=" panel-title"><a class="btn btn-danger align-right" href="http://localhost/BTL/admin/danhmuc/">Quay lại</a></h3>
				
              </div>
    <div class="row">
		<div class="col-xs-12 col-sm-12">
            
              ﻿<form name="adminForm" class="" method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8" style="margin-bottom:10px">
					<div class="row">
						<div class="col-md-2"></div>
						<div class=" row col-md-8">
							
							<div class="form-group col-md-12">
								<label class="col-md-4">Hình ảnh</label>
								<input  type="file" name="image">
							</div>
							
							<div class="col-md-12 text-center">
								<input class="btn btn-success" type="submit" name="edit" value="Cập nhật"/>
							</div>
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


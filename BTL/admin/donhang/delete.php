<?php
	include('../lib_db.php');
     $id= $_GET['id'];
    $sql= "DELETE FROM `donhang` WHERE id=$id";
    exec_update($sql);
	$sql= "DELETE FROM `chitiet_donhang` WHERE id_donhang = ($id)";
		exec_update($sql);
    header("Location: index.php");
?>
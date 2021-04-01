<?php
	include('../lib_db.php');
     $id= $_GET['id'];
    $sql= "DELETE FROM `banner` WHERE id=$id";
    // echo $sql;exit;
   // mysqli_query($link,$sql);
    exec_update($sql);
    header("Location: index.php");
?>
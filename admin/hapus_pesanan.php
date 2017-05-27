<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from pesanan where id='$id'");
header("location:pesanan.php");

?>
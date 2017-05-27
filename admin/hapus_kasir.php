<?php 
include 'config.php';
$id_kas=$_GET['id'];
mysql_query("delete from admin where id='$id_kas'");
header("location:kasir.php");

?>
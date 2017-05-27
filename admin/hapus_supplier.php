<?php 
include 'config.php';
$id_sup=$_GET['id'];
mysql_query("delete from supplier where id_supplier='$id_sup'");
header("location:supplier.php");

?>
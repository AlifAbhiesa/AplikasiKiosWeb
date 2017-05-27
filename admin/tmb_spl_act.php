<?php 
include 'config.php';
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];



mysql_query("insert into supplier values('','$nama','$alamat','$no_hp')");
header("location:supplier.php");

 ?>
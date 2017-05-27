<?php 
include 'config.php';
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$suplier=$_POST['suplier'];
$modal=$_POST['modal'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$sisa=$_POST['jumlah'];
$tempat=$_POST['tempat'];

mysql_query("insert into barang values('','$nama','$jenis','$suplier','$modal','$harga','$jumlah','$sisa','$tempat')");
header("location:barang.php");

 ?>
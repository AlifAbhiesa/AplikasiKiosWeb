<?php 
include 'config.php';
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$suplier=$_POST['suplier'];
$modal=$_POST['modal'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$tempat=$_POST['tempat'];
$pemesan=$_POST['pemesan'];
$status=$_POST['status'];
$tanggal=$_POST['tanggal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_hargaa=$jumlah*$harga;

mysql_query("insert into pesanan values('','$nama','$jenis','$suplier','$modal','$harga','$jumlah','$tempat','$pemesan','$status','$tanggal','$labaa','$total_hargaa')");
header("location:pesanan.php");

 ?>
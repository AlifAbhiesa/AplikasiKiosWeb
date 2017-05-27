<?php 
include 'config.php';
$id=$_POST['id'];
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

mysql_query("update pesanan set nama='$nama', jenis='$jenis', suplier='$suplier', modal='$modal', harga='$harga', jumlah='$jumlah', tempat='$tempat', pemesan='$pemesan', tanggal='$tanggal', laba='$labaa', total_harga='$total_hargaa', status='$status' where id='$id'");
header("location:pesanan.php");

?>
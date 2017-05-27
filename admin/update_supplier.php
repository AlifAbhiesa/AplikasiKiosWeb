<?php 
include 'config.php';

$id_sup=$_POST['id'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];

mysql_query("update supplier set nama='$nama', alamat='$alamat', no_hp='$no_hp' where id_supplier='$id_sup'");
header("location:supplier.php");

?>
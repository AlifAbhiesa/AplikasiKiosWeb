<?php 
include 'config.php';

$id_kas=$_POST['id'];
$pass=md5($_POST['pass']);

$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];

mysql_query("update admin set nama='$nama', alamat='$alamat', no_hp='$no_hp', pass='$pass' where id='$id_kas'");
header("location:kasir.php");

?>
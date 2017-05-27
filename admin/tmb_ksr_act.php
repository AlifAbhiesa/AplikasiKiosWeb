<?php 
include 'config.php';
$uname=$_POST['uname'];
$pass=md5($_POST['pass']);
$status=$_POST['status'];

$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];

mysql_query("insert into admin values('','$uname','$pass','$status','$nama','$alamat','$no_hp')");
header("location:kasir.php");

 ?>
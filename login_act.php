<?php 
session_start();
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=md5($pass);
$query=mysql_query("select * from admin where uname='$uname' and pass='$pas'")or die(mysql_error());
if(mysql_num_rows($query)==1){
	$c = mysql_fetch_array($query);
	$_SESSION['uname']=$c['uname'];
	$_SESSION['status']=$c['status'];
	
	if($c['status'] == "administrator"){
	header("location:admin/index.php");	
	}
	
	else{
	header("location:index.php?pesan=gagal")or die(mysql_error());
	// mysql_error();
}
}
// echo $pas;
 ?>
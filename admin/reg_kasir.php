<?php 
include 'config.php';

$id=mysql_query("select id_kasir from kasir where no_hp = '$no_hp'");
$passx=md5($pass);
echo $id;

 ?>
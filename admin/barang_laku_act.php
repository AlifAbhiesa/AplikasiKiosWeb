<?php 

include 'config.php';
$tgl=$_POST['tgl'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];


// Cek username di database
$cek_username=mysql_num_rows(mysql_query
             ("SELECT nama FROM barang
               WHERE nama='$nama'"));
// Kalau username sudah ada yang pakai
if ($cek_username == 0){
  echo "barang tidak ada dalam list";
}
// Kalau username valid, inputkan data ke tabel users
else{
$uname=$_POST['uname'];
$dt=mysql_query("select * from barang where nama='$nama'");
$data=mysql_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysql_query("update barang set jumlah='$sisa' where nama='$nama'");

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;
mysql_query("insert into barang_laku values('','$tgl','$nama','$jumlah','$harga','$total_harga','$labaa','$uname')")or die(mysql_error());
header("location:barang_laku.php");
}

?>
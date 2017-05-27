<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="kasir.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_kas=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from admin where id='$id_kas'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $d['alamat'] ?></td>
		</tr>
		<tr>
			<td>Nomor Handphone</td>
			<td><?php echo $d['no_hp'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>
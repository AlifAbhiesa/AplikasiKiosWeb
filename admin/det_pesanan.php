<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pesanan</h3>
<a class="btn" href="pesanan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_pesanan=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from pesanan where id='$id_pesanan'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Tanggal</td>
			<td><?php echo $d['tanggal'] ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['jenis'] ?></td>
		</tr>
		<tr>
			<td>Suplier</td>
			<td><?php echo $d['suplier'] ?></td>
		</tr>
		<tr>
			<td>Modal</td>
			<td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Total Harga</td>
			<td>Rp. <?php echo number_format($d['total_harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr>
		<tr>
		<tr>
			<td>Laba</td>
			<td><?php echo $d['laba'] ?></td>
		</tr>
			<td>Pemesan</td>
			<td><?php echo $d['pemesan'] ?></td>
		</tr>
		<tr>
			<td>Pembayaran</td>
			<td><?php echo $d['status'] ?></td>
		</tr>
		<tr>
			<td>Tempat</td>
			<td><?php echo $d['tempat'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>
<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pesanan</h3>
<a class="btn" href="pesanan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from pesanan where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_pesanan.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Pemesanan</td>
				<td><input type="text" class="form-control" name="tanggal" value="<?php echo $d['tanggal'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td><input type="text" class="form-control" name="jenis" value="<?php echo $d['jenis'] ?>"></td>
			</tr>
			<tr>
				<td>Suplier</td>
				<td><input type="text" class="form-control" name="suplier" value="<?php echo $d['suplier'] ?>"></td>
			</tr>
			<tr>
				<td>Modal</td>
				<td><input type="text" class="form-control" name="modal" value="<?php echo $d['modal'] ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr>
			<tr>
			<td>Status</td>
			<td>
						<select name="status">
						<option value="Sudah"> Sudah Dibayar</option>
						<option value="Belum"> Belum Dibayar</option>
						</select>
			</td>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>
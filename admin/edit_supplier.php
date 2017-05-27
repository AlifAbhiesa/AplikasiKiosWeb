<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Supplier</h3>
<a class="btn" href="supplier.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_sup=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from supplier where id_supplier='$id_sup'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_supplier.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input hidden="True" name="id" value="<?php echo $d['id_supplier'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
			</tr>
			
			<tr>
				<td>Nomor Handphone</td>
				<td><input type="text" class="form-control" name="no_hp" value="<?php echo $d['no_hp'] ?>"></td>
			</tr>
			
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
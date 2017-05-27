<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Kasir</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah kasir</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from admin");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<form action="cari_kasir.php" method="get">
	<div class="input-group col-md-2 col-md-offset-10">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari nama kasir .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">Nama</th>
		<th class="col-md-3">Alamat</th>
		<th class="col-md-1">No Hp</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from admin where nama like '%$cari%' and status='kasir'");
	}else{
		$brg=mysql_query("select * from admin where status = 'kasir' limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['alamat'] ?></td>
			<td><?php echo $b['no_hp'] ?></td>
			<td>
				<a href="det_kasir.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit_kasir.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_kasir.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Kasir</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_ksr_act.php" method="post">

				    <div class="form-group">
						
						<input name="status" Hidden="True" Value="kasir">
					</div>
					
					<div class="form-group">
						<label>Username</label>
						<input name="uname" type="text" class="form-control" placeholder="Username ..">
					</div>
					
					<div class="form-group">
						<label>Password</label>
						<input name="pass" type="text" class="form-control" placeholder="Password ..">
					</div>
					
					<div class="form-group">
						<label>Nama kasir</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Lengkap ..">
					</div>
					
					<div class="form-group">
						<label>Alamat</label>
						<input name="alamat" type="text" class="form-control" placeholder="Alamat ..">
					</div>
					<div class="form-group">
						<label>Nomor Hp</label>
						<input name="no_hp" type="text" class="form-control" placeholder="Nomor Handphone ..">
					</div>
						

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>
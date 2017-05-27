<?php include 'header.php'; ?>
<head>
	<title>JQuery UI Part 2 : Membuat form inputan tanggal dengan jquery ui</title>	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
	
</head>
<script type="text/javascript">
	$(document).ready(function(){
		 $(".input-tanggal").datepicker({dateFormat:'yy-mm-dd'});	
	});
</script>
<h3><span class="glyphicon glyphicon-message"></span>  Data pesanan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Pesanan</button>
<br/>
<br/>

<?php 
$periksa=mysql_query("select * from pesanan where jumlah <=3");
while($q=mysql_fetch_array($periksa)){	
	if($q['jumlah']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "";	
	}
}
?>
<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from pesanan");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="" method="get">
	<div class="input-group col-md-offset-9">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<input type="text" class="form-control and input-tanggal" name="tanggal" onchange="this.form.submit()">
			
	</div>

</form>
<br/>
<?php 
if(isset($_GET['tanggal'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<th>Harga Terjual</th>
		<th>Total Harga</th>
		<th>Jumlah</th>
		<th>Laba</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['tanggal'])){
		$tanggal=mysql_real_escape_string($_GET['tanggal']);
		$brg=mysql_query("select * from pesanan where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysql_query("select * from pesanan order by tanggal desc");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td>Rp.<?php echo number_format($b['total_harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>
			<td>Rp.<?php echo number_format($b['laba']) ?>,-</td>
			<td>
				<a href="det_pesanan.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit_pesanan.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pesanan.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="7">Total Modal</td>
		<?php 
		if(isset($_GET['tanggal'])){
			$tanggal=mysql_real_escape_string($_GET['tanggal']);
			$x=mysql_query("select sum(modal) as total from pesanan where tanggal='$tanggal'");	
			$xx=mysql_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{

		}

		?>
	</tr>
	<tr>
		<td colspan="7">Total Pemasukan</td>
		<?php 
		if(isset($_GET['tanggal'])){
			$tanggal=mysql_real_escape_string($_GET['tanggal']);
			$x=mysql_query("select sum(total_harga) as total from pesanan where tanggal='$tanggal'");	
			$xx=mysql_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{

		}

		?>
	</tr>
	<tr>
		<td colspan="7">Total Laba</td>
		<?php 
		if(isset($_GET['tanggal'])){
			$tanggal=mysql_real_escape_string($_GET['tanggal']);
			$x=mysql_query("select sum(laba) as total from pesanan where tanggal='$tanggal'");	
			$xx=mysql_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{

		}

		?>
	</tr>
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
				<h4 class="modal-title">Tambah Pesanan Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_psn_act.php" method="post">
					<div class="form-group">
						<label>Tanggal Pesanan</label>
						<input name="tanggal" id="tanggal" type="text" class="form-control and input-tanggal" placeholder="Tanggal ..">
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
					</div>
					<div class="form-group">
						<label>Suplier</label>
						<input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
					</div>
					<div class="form-group">
						<label>Harga Modal</label>
						<input name="modal" type="text" class="form-control" placeholder="Modal per unit">
					</div>	
					<div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual per unit">
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>	
					<div class="form-group">
						<label>Tempat simpan</label>
						<textarea name="tempat" type="text" class="form-control" placeholder="Tempat simpan"></textarea>
					</div>
					<div class="form-group">
						<label>Nama Pemesan</label>
						<input name="pemesan" type="text" class="form-control" placeholder="Nama Pemesan ..">
					</div>
					<div class="form-group">
					<label>Status Pesanan</label>
						<select name="status">
						<option value="Sudah"> Sudah Dibayar</option>
						<option value="Belum"> Belum Dibayar</option>
						</select>
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
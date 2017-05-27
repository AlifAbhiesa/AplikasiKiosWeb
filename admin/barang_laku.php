<?php include 'header.php';	?>
<head>
	<title>JQuery UI Part 2 : Membuat form inputan tanggal dengan jquery ui</title>	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
	
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() {  
        $( "#nama" ).autocomplete({
         source: "data.php",  
           minLength:2, 
        });
    });
    </script>
	
</head>
<script type="text/javascript">
	$(document).ready(function(){
		 $(".input-tanggal").datepicker({dateFormat:'yy-mm-dd'});	
	});
</script>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang Terjual</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Entry Barang Laku</button>
<form action="" method="get">


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from barang_laku");
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
	
</div>

	<div class="input-group col-md-offset-9">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<input type="text" class="form-control and input-tanggal" name="tanggal" onchange="this.form.submit()">
			
	</div>

</form>
<br/>
<?php 
if(isset($_GET['tanggal'])){
	$tanggal=mysql_real_escape_string($_GET['tanggal']);
	$tg="lap_barang_laku.php?tanggal='$tanggal'";
	?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
	$tg="lap_barang_laku.php";
}
?>

<br/>
<?php 
if(isset($_GET['tanggal'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<th>Harga Terjual /pc</th>
		<th>Total Harga</th>
		<th>Jumlah</th>			
		<th>Laba</th>			
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['tanggal'])){
		$tanggal=mysql_real_escape_string($_GET['tanggal']);
		$brg=mysql_query("select * from barang_laku where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysql_query("select * from barang_laku order by tanggal desc limit $start, $per_hal");
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
			<td><?php echo "Rp.".number_format($b['laba']).",-"?></td>			
			<td>		
				<a href="edit_laku.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_laku.php?id=<?php echo $b['id']; ?>&jumlah=<?php echo $b['jumlah'] ?>&nama=<?php echo $b['nama']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		<?php 
	}
	?>
	<tr>
		<td colspan="7">Total Pemasukan</td>
		<?php 
		if(isset($_GET['tanggal'])){
			$tanggal=mysql_real_escape_string($_GET['tanggal']);
			$x=mysql_query("select sum(total_harga) as total from barang_laku where tanggal='$tanggal'");	
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
			$x=mysql_query("select sum(laba) as total from barang_laku where tanggal='$tanggal'");	
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
				<h4 class="modal-title">Tambah Penjualan
				</div>
				<div class="modal-body">				
					<form action="barang_laku_act.php" method="post">
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off">
						</div>	
						<div class="ui-widget">
						<label for="nama">Nama Barang</label>
						<input class="form-control" id="nama" name="nama"  />
						</div>
						
						<div>
						
						<input hidden="True" id="uname" name="uname" value=" <?php echo $_SESSION['uname']; ?>"> 
						</div>
															
						<div class="form-group">
							<label>Harga Jual / unit</label>
							<input name="harga" type="text" class="form-control" placeholder="Harga" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	<?php include 'footer.php'; ?>
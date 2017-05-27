<?php 
include 'header.php';
?>

<?php
$a = mysql_query("select * from barang_laku");
?>

<!-- /.row -->

                <div class="row">
                    <div class="col-lg-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
							
							
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
											

											<th>Tanggal</th>
                                                <th>Uang Masuk</th> 
 											<th>Laba</th>	
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
		
		<?php 
			$tanggal=mysql_query("select distinct tanggal from barang_laku order by tanggal desc");		
					
		?>
		
		
		
		<?php 
			while($b=mysql_fetch_array($tanggal)){
			$tgl = $b['tanggal'];
			$x=mysql_query("select sum(total_harga) as total from barang_laku where tanggal='$tgl'");	
			$xx=mysql_fetch_array($x);

			$y=mysql_query("select sum(laba) as laba from barang_laku where tanggal='$tgl'");	
			$yy=mysql_fetch_array($y);			
				?>
				
				<tr>
				<td><?php echo $b['tanggal'] ?></td>
				<td><?php echo $xx['total'] ?></td>
				<td><?php echo $yy['laba'] ?></td>
				</tr>
				<?php
			}
		
			
		?>	
		
		
		
		
	
	
		
	
                                        </tbody>
                                    </table>
                                </div>
                </div>
				</div>
                <!-- /.row -->
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>
<?php 
  require 'connection.php';
  checkLogin();
  if (isset($_POST['btnLaporanPemasukan'])) {
	$dari_tanggal_date = htmlspecialchars($_POST['dari_tanggal']);
	$sampai_tanggal_date = htmlspecialchars($_POST['sampai_tanggal']);
	$dari_tanggal = strtotime(htmlspecialchars($_POST['dari_tanggal'] . " 00:00:00"));
	$sampai_tanggal = strtotime(htmlspecialchars($_POST['sampai_tanggal'] . " 23:59:59"));
	$sql = mysqli_query($conn, "SELECT * FROM pemasukan INNER JOIN user ON pemasukan.id_user = user.id_user WHERE tanggal_pemasukan BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");
	$fetch_sql = mysqli_fetch_assoc($sql);
  }
  if (isset($_POST['btnLaporanPengeluaran'])) {
  	$dari_tanggal_date = htmlspecialchars($_POST['dari_tanggal']);
  	$sampai_tanggal_date = htmlspecialchars($_POST['sampai_tanggal']);
  	$dari_tanggal = strtotime(htmlspecialchars($_POST['dari_tanggal'] . " 00:00:00"));
  	$sampai_tanggal = strtotime(htmlspecialchars($_POST['sampai_tanggal'] . " 23:59:59"));
  	$sql = mysqli_query($conn, "SELECT * FROM pengeluaran INNER JOIN user ON pengeluaran.id_user = user.id_user WHERE tanggal_pengeluaran BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");
  	$fetch_sql = mysqli_fetch_assoc($sql);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'include/css.php'; ?>
  <title>Laporan</title>
  <style>
  	@media print {
	  	.not-printed {
	  		display: none;
	  	}
	  	.total {
	  		color: black !important;
	  	}
  	}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  
  <?php include 'include/navbar.php'; ?>

  <?php include 'include/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="not-printed row justify-content-center">
        	<div class="col-lg-5 mr-4">
			<h3>Pemasukan</h3>
        		<form method="post">
        			<div class="row">
        				<div class="col-lg">
        					<div class="form-group">
		        				<label for="dari_tanggal">Dari Tanggal</label>
		        				<?php if (isset($_POST['btnLaporanPemasukan'])): ?>
			        				<input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="<?= $_POST['dari_tanggal']; ?>">
	        					<?php else: ?>
			        				<input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="<?= date('Y-m-01'); ?>">
		        				<?php endif ?>
		        			</div>
        				</div>
        				<div class="col-lg">
        					<div class="form-group">
		        				<label for="sampai_tanggal">Sampai Tanggal</label>
		        				<?php if (isset($_POST['btnLaporanPemasukan'])): ?>
			        				<input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="<?= $_POST['sampai_tanggal']; ?>">
	        					<?php else: ?>
			        				<input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="<?= date('Y-m-d'); ?>">
		        				<?php endif ?>
		        			</div>
        				</div>
        			</div>
        			<div class="form-group">
        				<button type="submit" name="btnLaporanPemasukan" class="btn btn-primary">Laporan Pemasukan</button>
        			</div>
        		</form>
        	</div>
        	<div class="col-lg-5 ml-4">
        		<h3>Pengeluaran</h3>
        		<form method="post">
        			<div class="row">
        				<div class="col-lg">
        					<div class="form-group">
		        				<label for="dari_tanggal">Dari Tanggal</label>
		        				<?php if (isset($_POST['btnLaporanPengeluaran'])): ?>
			        				<input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="<?= $_POST['dari_tanggal']; ?>">
	        					<?php else: ?>
			        				<input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="<?= date('Y-m-01'); ?>">
		        				<?php endif ?>
		        			</div>
        				</div>
        				<div class="col-lg">
        					<div class="form-group">
		        				<label for="sampai_tanggal">Sampai Tanggal</label>
		        				<?php if (isset($_POST['btnLaporanPengeluaran'])): ?>
			        				<input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="<?= $_POST['sampai_tanggal']; ?>">
	        					<?php else: ?>
			        				<input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="<?= date('Y-m-d'); ?>">
		        				<?php endif ?>
		        			</div>
        				</div>
        			</div>
        			<div class="form-group">
        				<button type="submit" name="btnLaporanPengeluaran" class="btn btn-primary">Laporan Pengeluaran</button>
        			</div>
        		</form>
        	</div>
        </div>
        <?php if (isset($_POST['btnLaporanPemasukan'])): ?>
        	<hr class="not-printed">
        	<button onclick="return print()" class="not-printed btn btn-success"><i class="fas fa-fw fa-print"></i> Print</button>
        	<div class="row m-1 mb-0">
	        	<div class="col-lg m-1">
	        		<h2 class="text-center mb-3 mt-2">Laporan Pemasukan</h2>
	        		<h3 class="text-left mb-3">Laporan Dari Tanggal: <?= $dari_tanggal_date; ?> Sampai Tanggal: <?= $sampai_tanggal_date; ?></h3>
	        		<div class="table-responsive">
	        			<table class="table table-bordered table-hover">
	        				<thead>
	        					<tr>
	        						<th>No.</th>
	        						<th>Pemasukan</th>
	        						<th>Keterangan</th>
	        						<th>Tanggal Pemasukan</th>
	        						<th>Username</th>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					<?php $i = 1; ?>
	        					<?php $total_pemasukan = '0'; ?>
	        					<?php foreach ($sql as $ds): ?>
	        						<tr>
	        							<td><?= $i++; ?></td>
	        							<td><?= number_format($ds['jumlah_pemasukan']); ?></td>
	        							<td><?= $ds['keterangan']; ?></td>
	        							<td><?= date('d-m-Y, H:i:s', $ds['tanggal_pemasukan']); ?></td>
	        							<td><?= $ds['username']; ?></td>
	        						</tr>
	        						<?php 
	        							$total_pemasukan += $ds['jumlah_pemasukan'];
	        						?>
	        					<?php endforeach ?>
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
    		<div class="row mx-1 mb-1 mt-0">
    			<div class="col-lg-4">
		    		<div class="p-3 rounded bg-success total">Total Pemasukan: Rp. <?= number_format($total_pemasukan); ?></div>
    			</div>
    		</div>
        <?php endif ?>
        <?php if (isset($_POST['btnLaporanPengeluaran'])): ?>
        	<hr class="not-printed">
        	<button onclick="return print()" class="not-printed btn btn-success"><i class="fas fa-fw fa-print"></i> Print</button>
        	<div class="row m-1 mb-0">
	        	<div class="col-lg m-1">
	        		<h2 class="text-center mb-3 mt-2">Laporan Pengeluaran</h2>
	        		<h3 class="text-left mb-3">Laporan Dari Tanggal: <?= $dari_tanggal_date; ?> Sampai Tanggal: <?= $sampai_tanggal_date; ?></h3>
	        		<div class="table-responsive">
	        			<table class="table table-bordered table-hover">
	        				<thead>
	        					<tr>
	        						<th>No.</th>
	        						<th>Pengeluaran</th>
	        						<th>Keterangan</th>
	        						<th>Tanggal Pengeluaran</th>
	        						<th>Username</th>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					<?php $i = 1; ?>
	        					<?php $total_pengeluaran = '0'; ?>
	        					<?php foreach ($sql as $ds): ?>
	        						<tr>
	        							<td><?= $i++; ?></td>
	        							<td><?= number_format($ds['jumlah_pengeluaran']); ?></td>
	        							<td><?= $ds['keterangan']; ?></td>
	        							<td><?= date('d-m-Y, H:i:s', $ds['tanggal_pengeluaran']); ?></td>
	        							<td><?= $ds['username']; ?></td>
	        						</tr>
	        						<?php 
	        							$total_pengeluaran += $ds['jumlah_pengeluaran'];
	        						?>
	        					<?php endforeach ?>
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
    		<div class="row mx-1 mb-1 mt-0">
    			<div class="col-lg-4">
		    		<div class="p-3 rounded bg-success total">Total Pengeluaran: Rp. <?= number_format($total_pengeluaran); ?></div>
    			</div>
    		</div>
        <?php endif ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 By Sri Nur Linda.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
	<script>
		$(document).ready(function() {
			function print() {
				window.print();
			}
		});
	</script>
</div>
</body>
</html>

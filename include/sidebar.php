<?php 
  $dataUser = dataUser();
  $jml_pengeluaran = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(jumlah_pengeluaran) as jml_pengeluaran FROM pengeluaran"));
  $jml_pengeluaran = $jml_pengeluaran['jml_pengeluaran'];

  $jml_pemasukan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(jumlah_pemasukan) as jml_pemasukan FROM pemasukan"));
  $jml_pemasukan = $jml_pemasukan['jml_pemasukan'];
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="assets/img/img_properties/LOGO KJT.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">KAS MANIS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="profile.php" class="nav-link"><i class="nav-icon fas fa-fw fa-user"></i> <p><?= $dataUser['username']; ?></p></a>
        </li>
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <div class="bg-success nav-link text-white">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p>
              Sisa Saldo: <?= number_format($jml_pemasukan - $jml_pengeluaran); ?>
            </p>
          </div>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="index.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($dataUser['id_jabatan'] == '1'): ?>
          <li class="nav-item">
            <a href="jabatan.php" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Jabatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
        <?php endif ?>
        <li class="nav-item">
          <a href="pemasukan.php" class="nav-link">
            <i class="fas fa-dollar-sign nav-icon"></i>
            <p>Pemasukan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pengeluaran.php" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>Pengeluaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="laporan.php" class="nav-link">
            <i class="fas fa-file nav-icon"></i>
            <p>Laporan</p>
          </a>
        </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
          <a href="riwayat_pemasukan.php" class="nav-link">
            <i class="fas fa-stopwatch nav-icon"></i>
            <p>Riwayat Pemasukan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="riwayat_pengeluaran.php" class="nav-link">
            <i class="fas fa-stopwatch nav-icon"></i>
            <p>Riwayat Pengeluaran</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
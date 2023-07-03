<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="<?= base_url() ?>mahasiswa/dashboard" class="nav-link <?php if( $title == 'Dashboard') {echo "active";}?>">
        <i class="nav-icon icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-header">DATA MASTER</li>

    <li class="nav-item">
      <a href="<?= base_url() ?>mahasiswa/krs" class="nav-link <?php if( $title == 'Krs') {echo "active";}?>">
        <i class="nav-icon fa fa-users fa-columns"></i>
        <p>
          Data Krs
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= base_url() ?>mahasiswa/cetak" class="nav-link <?php if( $title == 'Cetak') {echo "active";}?>">
        <i class="nav-icon fa fa-users fa-columns"></i>
        <p>
          Cetak Krs
        </p>
      </a>
    </li>

  </ul>
</nav>
      <!-- /.sidebar-menu -->
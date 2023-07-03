<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="<?= base_url() ?>dosen/dashboard" class="nav-link <?php if( $title == 'Dashboard') {echo "active";}?>">
        <i class="nav-icon icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-header">DATA MASTER</li>

    <li class="nav-item">
      <a href="<?= base_url() ?>dosen/mahasiswa" class="nav-link <?php if( $title == 'Approve Krs') {echo "active";}?>">
        <i class="nav-icon fa fa-users fa-columns"></i>
        <p>
          Approve KRS Mahasiswa
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= base_url() ?>dosen/mahasiswa/setuju" class="nav-link <?php if( $title == 'Setuju') {echo "active";}?>">
        <i class="nav-icon fa fa-users fa-columns"></i>
        <p>
          Daftar KRS Mahasiswa disetujui
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= base_url() ?>dosen/mahasiswa/tolak" class="nav-link <?php if( $title == 'Tolak') {echo "active";}?>">
        <i class="nav-icon fa fa-users fa-columns"></i>
        <p>
          Daftar KRS Mahasiswa ditolak
        </p>
      </a>
    </li>

  </ul>
</nav>
      <!-- /.sidebar-menu -->
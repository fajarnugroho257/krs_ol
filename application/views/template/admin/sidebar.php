<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="<?= base_url() ?>admin/dashboard" class="nav-link <?php if( $title == 'Dashboard') {echo "active";}?>">
        <i class="nav-icon icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-header">KRS MAHASISWA</li>
    <li class="nav-item">
      <a href="<?= base_url() ?>admin/krs" class="nav-link <?php if( $title == 'KRS') {echo "active";}?>">
        <i class="nav-icon fa fa-users fa-columns"></i>
        <p>
          Data KRS
        </p>
      </a>
    </li>
    <li class="nav-header">DATA MASTER</li>

    <li class="nav-item">
      <a href="<?= base_url() ?>admin/mahasiswa" class="nav-link <?php if( $title == 'Mahasiswa') {echo "active";}?>">
        <i class="nav-icon fa fa-users fa-columns"></i>
        <p>
          Data Mahasiswa
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= base_url() ?>admin/dosen" class="nav-link <?php if( $title == 'Dosen') {echo "active";}?>">
        <i class="nav-icon fa fa-user-tie"></i>
        <p>
          Data Dosen
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= base_url() ?>admin/matkul" class="nav-link <?php if( $title == 'Mata Kuliah') {echo "active";}?>">
        <i class="nav-icon fa fa-book"></i>
        <p>
          Data Matakuliah
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= base_url() ?>admin/tahun_ajaran" class="nav-link <?php if( $title == 'Tahun Ajaran') {echo "active";}?>">
        <i class="nav-icon fas fa-globe"></i>
        <p>
          Data Tahun Ajaran
        </p>
      </a>
    </li>
  </ul>
</nav>
      <!-- /.sidebar-menu -->
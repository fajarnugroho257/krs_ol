<div class="content-wrapper"> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Selamat Datang <?= $mhs['nama_mahasiswa'] ?></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table>
          <tr>
            <td width="200px">Nama</td>
            <td width="100px">:</td>
            <td width="200px"><?= $mhs['nama_mahasiswa'] ?></td>
          </tr>
          <tr>
            <td width="200px">NPM</td>
            <td width="100px">:</td>
            <td width="200px"><?= $mhs['npm'] ?></td>
          </tr>
          <tr>
            <td width="200px">Program Studi</td>
            <td width="100px">:</td>
            <td width="200px"><?= $mhs['nama_prodi'] ?></td>
          </tr>
          <tr>
            <td width="200px">Dosen Pembimbing</td>
            <td width="100px">:</td>
            <td width="200px"><?= $mhs['nama_dosen'] ?></td>
          </tr>
          <tr>
            <td width="200px">Semester</td>
            <td width="100px">:</td>
            <td width="200px"><?= $mhs['semester'] ?></td>
          </tr>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
</div>

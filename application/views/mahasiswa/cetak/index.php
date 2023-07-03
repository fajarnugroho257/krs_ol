<div class="content-wrapper"> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>mahasiswa/dashboard">Dashboard</a></li>
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
        <h3 class="card-title">Hasil Krs Tahun Ajaran : <?= $ta_sekarang['tahun'] ?> <br> Semester : <?= $ta_sekarang['semester'] ?></h3>

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
        <br>
        <table class="table table-bordered">
          <tr>
            <td width="5%">No</td>
            <td width="10%">Smt</td>
            <td width="5%">Kelas</td>
            <td width="10%">KodeMK</td>
            <td width="20%">Mata Kuliah</td>
            <td width="5%">SKS</td>
            <td width="20%">Dosen</td>
            <td width="15%">Hari</td>
            <td width="15%">Jam</td>
          </tr>
          <?php $no = 1; foreach ($res_krs as $key => $value) { ?>
          <tr>
              <td><?= $no++ ?></td>
              <td><?= $value['smtr'] ?></td>
              <td><?= $value['kelas'] ?></td>
              <td><?= $value['kode_mk'] ?></td>
              <td><?= $value['nama_matkul'] ?></td>
              <td><?= $value['sks'] ?></td>
              <td><?= $value['nama_dosen'] ?></td>
              <td><?= $value['hari'] ?></td>
              <td><?= $value['dari_jam'] ?> - <?= $value['sampai_jam'] ?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="col-sm-1">
          <a href="<?= base_url() ?>mahasiswa/cetak/pdf" class="btn btn-block btn-primary btn-sm"><i class="fa fa-file-pdf"></i> Cetak Krs</a>
        </div>
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
</div>

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
        <h3 class="card-title">Daftar mata kuliah</h3>

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
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Smt</th>
              <th>Kelas</th>
              <th>KodeMK</th>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Dosen</th>
              <th>Hari</th>
              <th>Jam</th>
              <th>Ambil</th>
            </tr>
          </thead>
          <tbody>
            <form action="<?= base_url() ?>mahasiswa/krs/add_krs" method="post">
              <?php $no=1; foreach ($rs_krs as $key => $value) { ?>
                <tr>
                  <td align="center"><?= $no++ ?></td>
                  <td><?= $detail_mahasiswa['semester'] ?></td>
                  <td><?= $value['kelas'] ?></td>
                  <td><?= $value['kode_mk'] ?></td>
                  <td><?= $value['nama_matkul'] ?></td>
                  <td><?= $value['sks'] ?></td>
                  <td><?= $value['nama_dosen'] ?></td>
                  <td><?= $value['hari'] ?></td>
                  <td><?= $value['dari_jam'] ?> - <?= $value['sampai_jam'] ?></td>
                  <td>
                    <input type="checkbox" value="<?= $value['m_id_matkul'] ?>"
                    <?php if (!empty($value['mah_id_matkul'])): echo "checked"; ?>
                    <?php endif ?> name="pilih[]">
                  </td>
                </tr>
              <?php } ?>
              <tr>
                <td colspan="10">
                  <?php
                  if (empty(!$detail_krs)) {
                    if ($detail_krs['status'] == 'reject') { ?>
                      <input type="hidden" name="id_krs" value="<?= $detail_krs['id_krs'] ?>">
                      <button type="submit" name="aksi" value="update" class="btn btn-primary">Update</button>
                    <?php } elseif($detail_krs['status'] == 'waiting'){ ?>
                      <p>Krs anda sedang di <b>review</b> oleh dosen : <?= $detail_mahasiswa['nama_dosen'] ?></p>
                    <?php } elseif($detail_krs['status'] == 'approve'){ ?>
                      <p>Krs anda telah di <b>setujui</b> oleh dosen : <?= $detail_mahasiswa['nama_dosen'] ?></p>
                    <?php }
                  } else { ?>
                    <button type="submit" name="aksi" value="simpan" class="btn btn-primary">Simpan</button>
                  <?php }
                  ?>
                </td>
              </tr>
            </form>
          </tbody>
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
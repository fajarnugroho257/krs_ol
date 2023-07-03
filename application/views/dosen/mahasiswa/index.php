<div class="content-wrapper"> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>dosen/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Default box -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">Data <?= $title ?></h3> -->
              <h3 class="card-title">Data Krs <?= $title ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Npm</th>
                    <th>Prodi</th>
                    <th>Mata Kuliah yang diambil</th>
                    <th style="width: 200px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs_mahasiswa as $key => $value) { ?>
                    <tr>
                      <td align="center"><?= $no++ ?></td>
                      <td><?= $value['nama_mahasiswa'] ?></td>
                      <td><?= $value['npm'] ?></td>
                      <td><?= $value['nama_prodi'] ?></td>
                      
                      <td>
                        <?php foreach ($value['list_krs'] as $key2 => $value2) { ?>
                          <?= ($key2+1).'. '.$value2['nama_matkul'] ?> <br>
                        <?php }  ?>
                      </td>
                      <?php if ($value['status'] == 'waiting') { ?>
                        <td align="center">
                          <button class="btn btn-info btn-sm approve_krs"onclick="approve('<?= $value['id_krs'] ?>', '<?= $value['npm'] ?>', '<?= $value['nama_mahasiswa'] ?>')" ><i class="fas fa-list"></i> Aksi</button>
                        </td>
                      <?php } ?>
                      <?php if ($value['status'] == 'reject') { ?>
                        <td align="center">
                          <button class="btn btn-danger btn-sm approve_krs"><i class="fas fa-exclamation-triangle"></i> TOLAK</button>
                        </td>
                      <?php } ?>
                      <?php if ($value['status'] == 'approve') { ?>
                        <td align="center">
                          <button class="btn btn-success btn-sm approve_krs"><i class="fa fa-check"></i> SETUJU</button>
                        </td>
                      <?php } ?>
                      
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <?=  $this->pagination->create_links(); ?>
                <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modal-approve">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>dosen/mahasiswa/update_status_krs" method="POST">
        <input type="hidden" name="id_krs" id="id_krs" value="">
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_dosen">Nama Mahasiswa</label>
            <p id="nama_mahasiswa"></p>
          </div>
          
          <div class="form-group">
            <label for="nip">NPM</label>
            <p id="npm"></p>
          </div>

          <div class="form-group">
            <label for="nip">Mata kuliah yang diambil</label>
            <p id="mata_kuliah"></p>
          </div>

        </div>

        <div class="modal-footer justify-content-between">
          <button type="submit" name="status" value="approve" class="btn btn-success">Setuju</button>
          <button type="submit" name="status" value="reject" class="btn btn-danger">Tolak</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  function approve(id_krs, npm,nama_mahasiswa) {
    var url = '<?= base_url() ?>dosen/mahasiswa/get_list_krs_by_id_krs/'+id_krs;
    $.ajax({
          type: 'GET',
          url: url,
          dataType: 'json',
          success: function (result) {
            $('#mata_kuliah').html(result);
            $('#id_krs').val(id_krs);
            $('#npm').text(npm);
            $('#nama_mahasiswa').text(nama_mahasiswa);
            // 
            $('#modal-approve').modal('show');//now its working
          },
          error: function(error){
          alert("fail");
          }
      });
  }
</script>
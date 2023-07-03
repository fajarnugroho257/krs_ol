<div class="content-wrapper"> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Dashboard</a></li>
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
              <h3 class="card-title"><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah Data</button></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama mahasiswa</th>
                    <th>Npm / Username</th>
                    <th>Alamat</th>
                    <th>Semester</th>
                    <th style="width: 200px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs_mahasiswa as $key => $value) { ?>
                    <tr>
                      <td align="center"><?= $no++ ?></td>
                      <td><?= $value['nama_mahasiswa'] ?></td>
                      <td><?= $value['npm'] ?></td>
                      <td><?= $value['alamat'] ?></td>
                      <td><?= $value['semester'] ?></td>
                      <td align="center">
                        <a class="btn btn-info btn-sm edit_mahasiswa" href="#" onclick="update(<?= $value['id_mahasiswa'] ?>)" ><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="hapus(<?= $value['id_mahasiswa'] ?>)" ><i class="fas fa-trash"></i> Delete</a>
                      </td>
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

<div class="modal fade" id="modal-add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>admin/mahasiswa/insert" method="POST">
        <div class="modal-body">
          
          <div class="form-group">
            <label for="nama_mahasiswa">Nama mahasiswa</label>
            <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa_add" placeholder="Nama mahasiswa" required>
          </div>
          
          <div class="form-group">
            <label>Dosen Pembimbing</label>
            <select class="form-control select2" id="id_dosen_add" name="id_dosen" style="width: 100%;" required="required">
              <option value="">---</option>
              <?php foreach ($rs_dosen as $key => $dosen) { ?>
                <option value="<?= $dosen['id_dosen'] ?>"><?= $dosen['nama_dosen'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="nip">Npm</label>
            <input type="text" class="form-control" name="npm" id="npm_add" placeholder="Npm" required>
          </div>

          <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" class="form-control" name="semester" id="semester_add" placeholder="Semester" required>
          </div>

          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2" id="jk_add" name="jk" style="width: 100%;" required="required">
              <option value="">---</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label>Prodi</label>
            <select class="form-control select2" id="id_prodi_add" name="id_prodi" style="width: 100%;" required="required">
              <option value="">---</option>
              <?php foreach ($rs_prodi as $key => $prodi) { ?>
                <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['nama_prodi'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat_add" placeholder="Alamat" required>
          </div>

          <div class="form-group">
            <label for="alamat">Password</label>
            <input type="password" class="form-control" name="password" id="password_add" placeholder="Password" required>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>admin/mahasiswa/update" method="POST">
        <input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="">
        <input type="hidden" name="id_user" id="id_user" value="">
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_mahasiswa">Nama mahasiswa</label>
            <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa_edit" placeholder="Nama mahasiswa" required>
          </div>

          <div class="form-group">
            <label>Dosen Pembimbing</label>
            <select class="form-control select2" id="id_dosen_edit" name="id_dosen" style="width: 100%;" required="required">
              <option value="">---</option>
              <?php foreach ($rs_dosen as $key => $dosen) { ?>
                <option value="<?= $dosen['id_dosen'] ?>"><?= $dosen['nama_dosen'] ?></option>
              <?php } ?>
            </select>
          </div>
          
          <div class="form-group">
            <label for="npm">Npm</label>
            <input type="text" class="form-control" name="npm" id="npm_edit" placeholder="Npm" required>
          </div>

          <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" class="form-control" name="semester" id="semester_edit" placeholder="Semester" required>
          </div>

          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2" id="jk_edit" name="jk" style="width: 100%;" required="required">
              <option value="">---</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label>Prodi</label>
            <select class="form-control select2" id="id_prodi_edit" name="id_prodi" style="width: 100%;" required="required">
              <option value="">---</option>
              <?php foreach ($rs_prodi as $key => $prodi) { ?>
                <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['nama_prodi'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat_edit" placeholder="Alamat" required>
          </div>

          <div class="form-group">
            <label for="alamat">Password</label>
            <input type="password" class="form-control" name="password" id="password_edit" placeholder="Password" required>
          </div>

        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-delete">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>admin/mahasiswa/delete" method="POST">
        <input type="hidden" name="id_mahasiswa" id="id_mahasiswa_delete" value="">
        <input type="hidden" name="id_user" id="id_user_delete" value="">
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_mahasiswa">Nama mahasiswa</label>
            <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa_delete" placeholder="Nama mahasiswa" readonly>
          </div>
          
          <div class="form-group">
            <label for="nip">Nip</label>
            <input type="text" class="form-control" name="nip" id="nip_delete" placeholder="Nip" readonly>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat_delete" placeholder="Alamat" readonly>
          </div>

          <div class="form-group">
            <label for="alamat">Password</label>
            <input type="password" class="form-control" name="password" id="password_delete" placeholder="Password" readonly>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  function update(id_mahasiswa) {
    var url = '<?= base_url() ?>admin/mahasiswa/get_mahasiswa_by_id/'+id_mahasiswa;
    $.ajax({
          type: 'GET',
          url: url,
          dataType: 'json',
          success: function (result) {
            $('#id_mahasiswa').val(result.id_mahasiswa);
            $('#id_dosen_edit').val(result.id_dosen).change();
            $('#id_prodi_edit').val(result.id_prodi).change();
            $('#jk_edit').val(result.jk).change();
            $('#nama_mahasiswa_edit').val(result.nama_mahasiswa);
            $('#npm_edit').val(result.npm);
            $('#alamat_edit').val(result.alamat);
            $('#semester_edit').val(result.semester);
            $('#username_edit').val(result.username);
            $('#password_edit').val(result.password);
            $('#id_user').val(result.id_user);
            // 
            $('#modal-edit').modal('show');//now its working
          },
          error: function(error){
          alert("fail");
          }
      });
  }

  function hapus(id_mahasiswa) {
    var url = '<?= base_url() ?>admin/mahasiswa/get_mahasiswa_by_id/'+id_mahasiswa;
    $.ajax({
          type: 'GET',
          url: url,
          dataType: 'json',
          success: function (result) {
            $('#id_mahasiswa_delete').val(result.id_mahasiswa);
            $('#nama_mahasiswa_delete').val(result.nama_mahasiswa);
            $('#npm_delete').val(result.npm);
            $('#alamat_delete').val(result.alamat);
            $('#username_delete').val(result.username);
            $('#password_delete').val(result.password);
            $('#id_user_delete').val(result.id_user);
            // 
            $('#modal-delete').modal('show');//now its working
          },
          error: function(result){
          alert("fail");
          }
      });
  }
</script>
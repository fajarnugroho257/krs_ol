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
                    <th>Matakuliah</th>
                    <th>Dosen</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Kode MK</th>
                    <th>SKS</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th style="width: 200px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs_matkul as $key => $value) { ?>
                    <tr>
                      <td align="center"><?= $no++ ?></td>
                      <td><?= $value['nama_matkul'] ?></td>
                      <td><?= $value['nama_dosen'] ?></td>
                      <td><?= $value['nama_prodi'] ?></td>
                      <td><?= strtoupper($value['semester']) ?></td>
                      <td><?= $value['kelas'] ?></td>
                      <td><?= $value['kode_mk'] ?></td>
                      <td><?= $value['sks'] ?></td>
                      <td><?= $value['hari'] ?></td>
                      <td><?= $value['dari_jam'] ?> - <?= $value['sampai_jam'] ?></td>
                      <td align="center">
                        <a class="btn btn-info btn-sm edit_matkul" href="#" onclick="update(<?= $value['id_matkul'] ?>)" ><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="hapus(<?= $value['id_matkul'] ?>)" ><i class="fas fa-trash"></i> Delete</a>
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
      <form action="<?= base_url() ?>admin/matkul/insert" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <input type="text" class="form-control" name="nama_matkul" id="nama_matkul_add" placeholder="Nama Mata Kuliah">
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
            <label>Dosen</label>
            <select class="form-control select2" id="id_dosen_add" name="id_dosen" style="width: 100%;" required="required">
              <option value="">---</option>
              <?php foreach ($rs_dosen as $key => $dosen) { ?>
                <option value="<?= $dosen['id_dosen'] ?>"><?= $dosen['nama_dosen'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Semester</label>
            <select class="form-control select2" id="semester_add" name="semester" style="width: 100%;" required="required">
              <option value="">---</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" name="kelas" id="kelas_add" placeholder="Kelas">
          </div>
          <div class="form-group">
            <label for="kode_mk">KodeMK</label>
            <input type="text" class="form-control" name="kode_mk" id="kode_mk_add" placeholder="KodeMK">
          </div>
          <div class="form-group">
            <label for="sks">SKS</label>
            <input type="text" class="form-control" name="sks" id="sks_add" placeholder="SKS">
          </div>
          <div class="form-group">
            <label for="hari">Hari</label>
            <input type="text" class="form-control" name="hari" id="hari_add" placeholder="Hari">
          </div>
          <div class="form-group">
            <label for="jam">Jam</label>
            <div class="row">
              <input type="time" class="form-control col-sm-4 mr-3" name="dari_jam" id="dari_add" placeholder="Dari">
               Sampai  
              <input type="time" class="form-control col-sm-4 ml-3" name="sampai_jam" id="sampai_add" placeholder="Sampai">
            </div>
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
      <form action="<?= base_url() ?>admin/matkul/update" method="POST">
        <input type="hidden" name="id_matkul" id="id_matkul" value="">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <input type="text" class="form-control" name="nama_matkul" id="nama_matkul_edit" placeholder="Nama Mata Kuliah">
          </div>
          <div class="form-group">
            <label>Prodi</label>
            <select class="form-control select2" id="id_prodi_edit" name="id_prodi" style="width: 100%;" required="required">
              <?php foreach ($rs_prodi as $key => $prodi) { ?>
                <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['nama_prodi'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Dosen</label>
            <select class="form-control select2" id="id_dosen_edit" name="id_dosen" style="width: 100%;" required="required">
              <?php foreach ($rs_dosen as $key => $dosen) { ?>
                <option value="<?= $dosen['id_dosen'] ?>"><?= $dosen['nama_dosen'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Semester</label>
            <select class="form-control select2" id="semester_edit" name="semester" style="width: 100%;" required="required">
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" name="kelas" id="kelas_edit" placeholder="Kelas">
          </div>
          <div class="form-group">
            <label for="kode_mk">KodeMK</label>
            <input type="text" class="form-control" name="kode_mk" id="kode_mk_edit" placeholder="KodeMK">
          </div>
          <div class="form-group">
            <label for="sks">SKS</label>
            <input type="text" class="form-control" name="sks" id="sks_edit" placeholder="SKS">
          </div>
          <div class="form-group">
            <label for="hari">Hari</label>
            <input type="text" class="form-control" name="hari" id="hari_edit" placeholder="Hari">
          </div>
          <div class="form-group">
            <label for="jam">Jam</label>
            <div class="row">
              <input type="time" class="form-control col-sm-4 mr-3" name="dari_jam" id="dari_edit" placeholder="Dari">
               Sampai  
              <input type="time" class="form-control col-sm-4 ml-3" name="sampai_jam" id="sampai_edit" placeholder="Sampai">
            </div>
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
      <form action="<?= base_url() ?>admin/matkul/delete" method="POST">
        <input type="hidden" name="id_matkul" id="id_matkul_delete" value="">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <input type="text" class="form-control" name="nama_matkul" id="nama_matkul_delete" placeholder="Nama Mata Kuliah" readonly>
          </div>
          <div class="form-group">
            <label>Prodi</label>
            <select class="form-control select2" id="id_prodi_delete" name="id_prodi" style="width: 100%;" required="required" disabled>
              <?php foreach ($rs_prodi as $key => $prodi) { ?>
                <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['nama_prodi'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Dosen</label>
            <select class="form-control select2" id="id_dosen_delete" name="id_dosen" style="width: 100%;" required="required" disabled>
              <?php foreach ($rs_dosen as $key => $dosen) { ?>
                <option value="<?= $dosen['id_dosen'] ?>"><?= $dosen['nama_dosen'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Semester</label>
            <select class="form-control select2" id="semester_delete" name="semester" style="width: 100%;" required="required" disabled>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
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
  function update(id_matkul) {
    var url = '<?= base_url() ?>admin/matkul/get_matkul_by_id/'+id_matkul;
    $.ajax({
          type: 'GET',
          url: url,
          dataType: 'json',
          success: function (result) {
            $('#id_matkul').val(result.id_matkul);
            $('#nama_matkul_edit').val(result.nama_matkul);
            $('#id_prodi_edit').val(result.id_prodi).change();
            $('#id_dosen_edit').val(result.id_dosen).change();
            $('#semester_edit').val(result.semester).change();

            $('#kelas_edit').val(result.kelas);
            $('#kode_mk_edit').val(result.kode_mk);
            $('#sks_edit').val(result.sks);
            $('#hari_edit').val(result.hari);
            $('#dari_edit').val(result.dari_jam);
            $('#sampai_edit').val(result.sampai_jam);
            // 
            $('#modal-edit').modal('show');//now its working
          },
          error: function(result){
          alert("fail");
          }
      });
  }

  function hapus(id_matkul) {
    var url = '<?= base_url() ?>admin/matkul/get_matkul_by_id/'+id_matkul;
    $.ajax({
          type: 'GET',
          url: url,
          dataType: 'json',
          success: function (result) {
            $('#id_matkul_delete').val(result.id_matkul);
            $('#nama_matkul_delete').val(result.nama_matkul);
            $('#id_prodi_delete').val(result.id_prodi).change();
            $('#id_dosen_delete').val(result.id_dosen).change();
            $('#semester_delete').val(result.semester).change();
            // 
            $('#modal-delete').modal('show');//now its working
          },
          error: function(result){
          alert("fail");
          }
      });
  }
</script>
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
            <li class="breadcrumb-item active">Blank Page</li>
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
              <!-- <h3 class="card-title">Data <?= $title ?></h3> -->
              <h3 class="card-title">
                <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah Data</button>
              </h3>
            </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Tahun Ajaran</th>
              <th style="width: 200px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($rs_ta as $key => $value) { ?>
              <tr>
                <td align="center"><?= $no++ ?></td>
                <td><?= $value['tahun'] ?></td>
                <td align="center">
                  <a class="btn btn-info btn-sm edit_dosen" href="#" onclick="update(<?= $value['id_ta'] ?>)" ><i class="fas fa-pencil-alt"></i> Edit</a>
                </td>
              </tr>
            <?php } ?>
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

<div class="modal fade" id="modal-add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>admin/tahun_ajaran/insert" method="POST">
        <div class="modal-body">
          
          <div class="form-group">
            <label for="tahun">Tahun Ajaran</label>
            <input type="text" class="form-control" name="tahun" id="tahun_add" placeholder="Tahun Ajaran" required>
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
      <form action="<?= base_url() ?>admin/tahun_ajaran/update" method="POST">
        <input type="hidden" name="id_ta" id="id_ta_edit">
        <div class="modal-body">
          
          <div class="form-group">
            <label for="tahun">Tahun Ajaran</label>
            <input type="text" class="form-control" name="tahun" id="tahun_edit" placeholder="Tahun Ajaran" required>
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

<script>
  function update(id_ta) {
    var url = '<?= base_url() ?>admin/tahun_ajaran/get_ta_by_id/'+id_ta;
    $.ajax({
          type: 'GET',
          url: url,
          dataType: 'json',
          success: function (result) {
            $('#id_ta_edit').val(result.id_ta);
            $('#tahun_edit').val(result.tahun);
            // 
            $('#modal-edit').modal('show');//now its working
          },
          error: function(error){
          alert("fail");
          }
      });
  }

</script>

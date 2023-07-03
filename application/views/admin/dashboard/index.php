<div class="content-wrapper"> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
            <!-- <li class="breadcrumb-item active">Blank Page</li> -->
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
        <h3 class="card-title">Tahun ajaran sekarang</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <form action="<?= base_url() ?>admin/dashboard/update_akademik" method="post">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Tahun Ajaran</label>
                <select class="form-control select2" name="id_ta" style="width: 100%;">
                <option value="">---</option>
                <?php foreach ($rs_ta as $key => $value) { ?>
                  <option value="<?= $value['id_ta'] ?>" <?php if($value['id_ta'] == $ta_sekarang['id_ta']){ echo "selected";} ?> ><?= $value['tahun'] ?></option>
                <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Semester</label>
                <select class="form-control select2" name="semester" style="width: 100%;">
                <option value="">---</option>
                  <option value="ganjil" <?php if('ganjil' == $ta_sekarang['semester']){ echo "selected";} ?>>GANJIL</option>
                  <option value="genap" <?php if('genap' == $ta_sekarang['semester']){ echo "selected";} ?>>GENAP</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update Tahun Ajaran</button>
        </div>
      </form>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
</div>

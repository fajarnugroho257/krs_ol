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
              <h3 class="card-title">
                Data Krs
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NPM</th>
                    <th>Smtr</th>
                    <th>DPA</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs_krs as $key => $value) { ?>
                    <tr>
                      <td align="center"><?= $no++ ?></td>
                      <td><?= $value['nama_mahasiswa'] ?></td>
                      <td><?= $value['npm'] ?></td>
                      <td><?= $value['mhs_smtr'] ?></td>
                      <td><?= $value['nama_dosen'] ?><br> Nip : <?= $value['nip'] ?></td>
                      <td align="center">
                        <?php if($value['status'] == 'waiting'){ ?>
                        <a class="btn btn-warning btn-sm edit_dosen" ><i class="fas fa-question"></i> Waiting</a>
                        <?php } ?>
                        <?php if($value['status'] == 'reject'){ ?>
                        <a class="btn btn-danger btn-sm" ><i class="fas fa-exclamation-triangle"></i> Reject</a>
                        <?php } ?>
                        <?php if($value['status'] == 'approve'){ ?>
                        <a class="btn btn-success btn-sm" ><i class="fas fa-check"></i> Approve</a>
                        <?php } ?>
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
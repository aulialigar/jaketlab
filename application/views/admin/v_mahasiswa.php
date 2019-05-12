<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php if ($this->session->flashdata('notif')) { ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('notif'); ?></div>
      <?php } ?>
      <h1>
        Mahasiswa
        <small>Jaket Lab</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Mahasiswa</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahMahasiswa">Tambah Mahasiswa</a> &emsp;
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="rekap" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>JK</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i = 1;
                    foreach ($mahasiswa as $m) { ?>
                      <tr>
                        <td><?= $i++ ;?></td>
                        <td><?= $m->nim ;?></td>
                        <td><?= $m->nama_mhs ;?></td>
                        <td><?= $m->no_telp ;?></td>
                        <td><?= $m->alamat ;?></td>
                        <td><?= ($m->jenis_kelamin == 'L') ? 'Laki - Laki':'Perempuan' ;?></td>
                        <td>
                          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" onclick="lihatMahasiswa(<?= $m->id_mahasiswa; ?>)"><i class="glyphicon glyphicon-search"></i> Lihat</a>
                          <a href="<?= base_url('index.php/admin/mahasiswa/remove/'.$m->id_mahasiswa)?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->

            <!-- modal -->
          <div class="modal fade" id="tambahMahasiswa">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Mahasiswa</h4>
                  </div>
                  <div class="modal-body">
                    <form  role="form" action="<?= base_url('index.php/admin/mahasiswa/insert'); ?>" method="post" enctype="multipart/form-data">
                     <div class="form-group has-feedback">
                      <span class="glyphicon glyphicon-user form-control-feedback pull-left"></span>
                      <input type="text" name="nim" class="form-control" placeholder="NIM">
                     </div>

                    <div class="form-group has-feedback">
                        <span class="glyphicon glyphicon-lock form-control-feedback pull-left"></span>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="form-group has-feedback">
                        <span class="glyphicon glyphicon-earphone form-control-feedback pull-left"></span>
                      <input type="text" name="nama" class="form-control" placeholder="Nama">
                    </div>

                    <div class="form-group has-feedback">
                      <select name="jk" class="form-control" required>
                        <option value="">PILIH JENIS KELAMIN ANDA</option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-laki</option>
                      </select>
                    </div>

                    <div class="form-group has-feedback">
                        <span class="glyphicon glyphicon-earphone form-control-feedback pull-left"></span>
                      <input type="text" name="telp" class="form-control" placeholder="Nomor Telepon">
                    </div>

                    <div class="form-group has-feedback">
                        <span class="glyphicon glyphicon-home form-control-feedback pull-left"></span>
                      <input type="text" name="alamat" class="form-control" placeholder="Alamat Rumah">
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="sbm" value="Tambah">
                  </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal fade" id="detailMahasiswa">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Mahasiswa</h4>
                  </div>
                  <div class="modal-body">
                    <form  id="fdm" role="form" action="<?= base_url('index.php/admin/mahasiswa/update/')?>" method="post" enctype="multipart/form-data">
                     <div class="form-group has-feedback">
                      <span class="glyphicon glyphicon-user form-control-feedback pull-left"></span>
                      <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM">
                    </div>

                    <div class="form-group has-feedback">
                        <span class="glyphicon glyphicon-home form-control-feedback pull-left"></span>
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                    </div>

                    <div class="form-group has-feedback">
                        <span class="glyphicon glyphicon-home form-control-feedback pull-left"></span>
                      <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Rumah">
                    </div>

                    <div class="form-group has-feedback">
                        <span class="glyphicon glyphicon-earphone form-control-feedback pull-left"></span>
                      <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor Telepon">
                    </div>

                    <div class="form-group has-feedback">
                      <select name="jk" id="jk" class="form-control" required>
                        <option value="">PILIH JENIS KELAMIN ANDA</option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-laki</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="sbm" value="Save Changes">
                  </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <script>
    function lihatMahasiswa(e) {
      if (e) {
        $.getJSON("<?= base_url('index.php/admin/mahasiswa/get/'); ?>" + e, function(res) {
          var form = $('#detailMahasiswa').find('form#fdm');
          form.attr('action', "<?= base_url('index.php/admin/mahasiswa/update/'); ?>" + e);
          form.find('#nim').val(res.nim);
          form.find('#nama').val(res.nama_mhs);
          form.find('#telp').val(res.no_telp);
          form.find('#alamat').val(res.alamat);
          form.find('#jk').val(res.jenis_kelamin);
          $('#detailMahasiswa').modal('show');
        });
      }
    }
  </script>
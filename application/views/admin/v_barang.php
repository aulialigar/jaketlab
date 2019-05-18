<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php if ($this->session->flashdata('notif')) { ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('notif'); ?></div>
      <?php } ?>
      <h1>
        Barang
        <small>Jaket Lab</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Menu</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahBarang">Tambah Barang</a> &emsp;
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="menu" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($barang as $b) { ?>
                      <tr>
                        <td><?php echo $b->id_barang; ?></td>
                        <td><?php echo $b->nama_barang; ?></td>
                        <td><?php echo $b->stok; ?></td>
                        <td>Rp <?php echo number_format($b->harga,0,',','.'); ?></td>
                        <td>
                          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" onclick="lihatBarang(<?php echo $b->id_barang; ?>)"><i class="glyphicon glyphicon-search"></i> Lihat</a>
                          <a href="<?= base_url('index.php/admin/barang/delete/').$b->id_barang; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                      </tr> <?php } ?>
                      
                  </tbody>
                </table>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>

          <div class="modal fade" id="tambahBarang">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Barang</h4>
                  </div>
                  <div class="modal-body">
                    <form  role="form" action="<?= base_url('index.php/admin/barang/insert'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nm_kp">Nama Barang</label>
                      <input type="text" class="form-control" value="" placeholder="Nama Barang" name="nama">
                    </div>
                    <div class="form-group">
                      <label for="stc">Stok</label>
                      <input type="text" class="form-control" value="" placeholder="Stok" name="stok">
                    </div>
                    <div class="form-group">
                      <label for="hrg">Harga</label>
                      <input type="text" class="form-control" value="" placeholder="Harga Barang" name="harga">
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

            <div class="modal fade" id="detailBarang">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Barang</h4>
                  </div>
                  <div class="modal-body">
                    <form  id="fdm" role="form" action="<?= base_url('index.php/admin/barang/update/')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nm_kp">Nama Barang</label>
                      <input type="text" class="form-control" value="" id="nm_br" placeholder="Nama Barang" name="nama">
                    </div>
                    <div class="form-group">
                      <label for="stc">Stok</label>
                      <input type="text" class="form-control" value="" id="stok" placeholder="Stok" name="stok">
                    </div>
                    <div class="form-group">
                      <label for="hrg">Harga</label>
                      <input type="text" class="form-control" value="" id="hrg" placeholder="Harga Barang" name="harga">
                    </div>
                    <!-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Foto Barang</label><br>
                          <img style="width:60%;height: auto" id="foto" src="" alt="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <input type="file" name="foto">
                          <p class="help-block">Upload Foto Barang</p>
                        </div>
                      </div>
                    </div> -->
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

    </section>
    <!-- /.content -->
  </div>
  <script>
    function lihatBarang(e) {
      if (e) {
        $.getJSON("<?= base_url('index.php/admin/barang/get/'); ?>" + e, function(res) {
          var form = $('#detailBarang').find('form#fdm');
          form.attr('action', "<?= base_url('index.php/admin/barang/update/'); ?>" + e);
          form.find('#stok').val(res.stok);
          form.find('#nm_br').val(res.nama_barang);
          form.find('#hrg').val(res.harga);
          $('#detailBarang').modal('show');
        });
      }
    }
  </script>
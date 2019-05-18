<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php if ($this->session->flashdata('notif')) { ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('notif'); ?></div>
      <?php } ?>
      <h1>
        Pesanan
        <small>Jaket Lab</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Rekap Transaksi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="rekap" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Id Barang</th>
                    <th>Ukuran</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($transaksi as $t) { ?>
                      <tr>
                        <td><?= $t->id_trans ;?></td>
                        <td><?= $t->nim ;?></td>
                        <td><?= $t->id_barang ;?></td>
                        <td><?= $t->ukuran ;?></td>
                        <td><?= $t->jml ;?></td>
                        <td><?= $t->keterangan ;?></td>
                        <td><?= $t->status ;?></td>
                        <td>
                          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" onclick="lihatTransaksi(<?php echo $t->id_trans; ?>)"><i class="glyphicon glyphicon-search"></i> Lihat</a>
                          <?php if ($t->status != 'TERKIRIM'): ?>
                            <a href="<?= base_url('admin/order/confirm/'.$t->id_trans)?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menerima pesanan?')"><i class="glyphicon glyphicon-check"></i> Accept</a>
                          <?php endif ?>
                          <?php if ($t->status != 'DITOLAK' && $t->status != 'TERKIRIM'): ?>
                            <a href="<?= base_url('admin/order/reject/'.$t->id_trans)?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin ingin menolak?')"><i class="fa fa-close"></i> Reject</a>
                          <?php endif ?>
                          <a href="<?= base_url('admin/order/remove/'.$t->id_trans)?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- modal confirmation -->
            <div class="modal fade" id="confirmImg" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">Bukti Pembayaran</div>
                  <div class="modal-body">
                    <img src="" alt="" width="100%">
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-success" href=""><i class="fa fa-check"></i> Konfirmasi</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal confirmation -->
          </div>
    </section>
    <!-- /.content -->
  </div>
   <div class="modal fade" id="lihatTransaksii">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Pesanan</h4>
                  </div>
                  <div class="modal-body">
                    <form  id="fdm" role="form" action="<?= base_url('index.php/admin/transaksi/update/')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nm_kp">ID Transaksi</label>
                      <input type="text" class="form-control" value="" id="id_tr" placeholder="ID Transaksi" name="id_trans">
                    </div>
                    <div class="form-group">
                      <label for="stc">NIM</label>
                      <input type="text" class="form-control" value="" id="nim" placeholder="NIM" name="nim">
                    </div>
                    <div class="form-group">
                      <label for="nm_kp">ID Barang</label>
                      <input type="text" class="form-control" value="" id="id_br" placeholder="ID Transaksi" name="id_br">
                    </div>
                    <div class="form-group">
                      <label for="ukr">Ukuran</label>
                      <input type="text" class="form-control" value="" id="ukr" placeholder="Ukuran" name="ukuran">
                    </div>
                    <div class="form-group">
                      <label for="jml">Jumlah</label>
                      <input type="text" class="form-control" value="" id="jml" placeholder="Jumlah" name="jumlah">
                    </div>
                    <div class="form-group">
                      <label for="ktr">Keterangan</label>
                      <input type="text" class="form-control" value="" id="ktr" placeholder="Keterangan" name="keterangan">
                    </div>
                    <div class="form-group">
                      <label for="sts">Status</label>
                      <input type="text" class="form-control" value="" id="sts" placeholder="Status" name="status">
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
  <script>
    function setModalImg(e, s) {
      $('#confirmImg').find('img').attr('src', $(e).attr('data-image'));
      if (s == 'reservasi') {
        $('#confirmImg').find('.modal-footer a').attr('href', "<?= base_url('admin/reservation/confirm/'); ?>" + $(e).attr('aria-index'));
      }
      if (s == 'transaksi') {
        $('#confirmImg').find('.modal-footer a').attr('href', "<?= base_url('admin/order/confirm/'); ?>" + $(e).attr('aria-index'));
      }
    }
  </script>

    <script>
    function lihatTransaksi(id){
      $.ajax({
            url: "<?= base_url('admin/getCart/'); ?>" + id,
            // data: {id: id},
            type: 'GET',
            success: function(e){
              if (e != '') {
          $('tbody#body_transaksi').html(e);
          $('#lihatTransaksii').modal('show');
}
              else{
               alert('Maaf, koneksi anda bermasalah');
              }
            }
      });
    }
  </script>
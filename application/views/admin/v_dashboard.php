<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php if ($this->session->flashdata('notif')) { ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('notif'); ?></div>
      <?php } ?>
      <h1>
        Dashboard
        <small>Jaket Lab</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mahasiswa</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa ion-android-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Barang</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-android-done"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Transaksi</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- /.row -->

            <!-- /.box-body -->

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
                    <th>Nama Mahasiswa</th>
                    <th>Tanggal Beli</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menerima pesanan?')"><i class="glyphicon glyphicon-check"></i> Accept</a>
                            <a href="" class="btn btn-warning btn-sm" onclick="return confirm('Yakin ingin menolak?')"><i class="fa fa-close"></i> Reject</a>
                          <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                      </tr>
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
<br>
<br>
<br>
<section style="margin-top:50px; margin-bottom:50px;padding:50px">
<head>
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css">
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/util.css">
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/main.css">
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.css">
</head>
	<div class="container" >	
		
			<div class="col-sm-9 col-md-6 col-lg-5 mx-auto " style="border: 3px solid grey; margin-bottom:20px; height:750px">	
				<div class="text-center" style="margin-bottom:5px;"><h2><span class="label label-info">Formulir Pemesanan Jaket Lab</span></h2></div>
				<form style="padding:20px;" action="<?= base_url('index.php/user/order') ;?>" method="POST">
				<?php if (!empty($notif)) { ?>
			    	<div class="alert alert-danger"><?= $notif; ?></div>
			    <?php } ?>
  					<!-- <div class="form-group">
					  <i class="fa fa-user"></i>
  					  <label for="Nama">| Nama:</label>
  						  <input type="text" class="form-control" id="Nama" placeholder="Nama">
 					 </div> -->
				   
				    <div class="form-group">
					<i class="fa fa-id-card"></i>
  					  <label for="Nim">| Nim:</label>
  						  <input type="text" class="form-control" id="Nim" placeholder="Nim" name="nim">
  					</div>

					<!-- <div class="form-group">
					  <i class="fa fa-map-marker"></i>
  					  <label for="Alamat">| Alamat:</label>
  						  <input type="text" class="form-control" id="Alamat" placeholder="Alamat">
  					</div> -->

					<!-- <div class="form-group">
						<i class="fa fa-phone"></i>
	  					<label for="Nomor">| No. telp:</label>
	  					<input type="number" class="form-control" id="Alamat" placeholder="no.telp">
  					</div> -->
					
					<div class="form-group">
						<i class="fa fa-shirtsinbulk"></i>
						<label for="ukuran">| Ukuran Baju:</label>
      					<select class="form-control" name="ukuran">
							<option value="pilih">pilih</option>
        					<option value="XL">XL</option>
        					<option value="L">L</option>
        					<option value="M">M</option>
							<option value="S">S</option>
      					</select>
    				</div>

					<div class="form-group">
						<i class="fa fa-graduation-cap"></i>
						<label for="barang">| Jenis Jaket:</label>
      					<select class="form-control" name="barang">
							<option value="pilih">pilih</option>
        					<option value="1">Abu-Abu</option>
        					<option value="2">Hitam</option>
      					</select>
    				</div>

    				<div class="form-group">
						<i class="fa fa-book"></i>
	  					<label for="Jumlah">| Jumlah:</label>
	  					<input type="number" class="form-control" id="Jumlah" placeholder="Jumlah" name="jml">
  					</div>

  					<div class="form-group">
						<i class="fa fa-pencil"></i>
	  					<label for="Keterangan">| Keterangan:</label>
	  					<textarea type="text" class="form-control" id="Keterangan" placeholder="Keterangan" name="keterangan"></textarea> 
  					</div>
 
					<!-- <div class="form-group">
					<p>
					<i class="fa fa-upload"></i>
					| Upload bukti pembayaran
					</p>
						<div class="custom-file">
  							<div class="input-group-addon">
    							<input type="file" class="custom-file-input" id="bukti pembayaran"
    								  aria-describedby="inputGroupFileAddon01">
 							 </div>
						</div>
					</div> -->

					<div class="form-group">
  					<input name="submit" type="submit" class="btn btn-primary pull-right" style="margin-bottom:20px; margin-top:20px;" value="Pesan">
					</div>
				</form>
			</div>	
	</div>
</section>

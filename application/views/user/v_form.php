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
		
			<div class="col-sm-9 col-md-6 col-lg-5 mx-auto " style="border: 3px solid grey; margin-bottom:20px; height:900px">	
				<div class="text-center" style="margin-bottom:5px;"><h2><span class="label label-info">Formulir Pemesanan Jaket Lab</span></h2></div>
				
				<form style="padding:20px;">
  					<div class="form-group">
					  <i class="fa fa-user"></i>
  					  <label for="Nama">| Nama:</label>
  						  <input type="text" class="form-control" id="Nama" placeholder="Nama">
 					 </div>

				   
				   
				    <div class="form-group">
					<i class="fa fa-id-card"></i>
  					  <label for="Nim">| Nim:</label>
  						  <input type="text" class="form-control" id="Nim" placeholder="Nim">
  					</div>

					  <div class="form-group">
					  <i class="fa fa-map-marker"></i>
  					  <label for="Alamat">| Alamat:</label>
  						  <input type="text" class="form-control" id="Alamat" placeholder="Alamat">
  					</div>

					  <div class="form-group">
					  <i class="fa fa-phone"></i>
  					  <label for="Nomor">| No. telp:</label>
  						  <input type="text" class="form-control" id="Alamat" placeholder="no.telp">
  					</div>
					
					<div class="form-group">
					<i class="fa fa-shirtsinbulk"></i>
						<label for="ukuran">| Ukuran Baju:</label>
					</div>


  
    				<div class="form-group">
      					<select class="form-control">
							<option value="pilih">pilih</option>
        					<option value="XL">XL</option>
        					<option value="L">L</option>
        					<option value="M">M</option>
							<option value="S">S</option>
      					</select>
    				</div>


					<div class="form-group">
					<i class="fa fa-graduation-cap"></i>
						<label for="angkatan">| angkatan:</label>
					</div>


  
    				<div class="form-group">
      					<select class="form-control">
							<option value="pilih">pilih</option>
        					<option value="ganjil">ganjil</option>
        					<option value="genap">genap</option>
        					
      					</select>
    				</div>
 
 
					<div class="form-group">
					
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
					</div>


						<div class="form-group">
  						<button type="submit" class="btn btn-primary pull-right" style="margin-bottom:20px; margin-top:20px;">Pesan</button>
						</div>
				</form>
				
			</div>	
	</div>
</section>
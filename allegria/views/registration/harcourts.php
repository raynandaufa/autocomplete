<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' - Allegria';

if(isset($_GET['ref']) && $_GET['ref']=='projek-apps'){
	$ref = 1;
} else {
	$ref = 0;
}

?>

<div class="row" id="header">
	<div class="col-md-12 col-xs-12 text-center">
		<img src="/images/logo-projek-small.png" style="max-width: 300px;">
	</div>
</div>

<div class="row" id="content" style="margin-top: 0; padding: 10px;">
	<div class="col-md-12 col-xs-12">

	    <?php if (isset($status)): ?>
	      <?php if ($status=='101'): ?>
	        <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Gagal!</strong> Semua bidang wajib diisi.</div>
	      <?php elseif ($status=='102'): ?>
	      	<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Gagal!</strong> Email Anda telah terdaftar sebelumnya.</div>
	      <?php elseif ($status=='103'): ?>
	      	<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Gagal!</strong> Nomor Telephone Anda telah terdaftar sebelumnya.</div>
	      <?php elseif ($status=='104'): ?>
	      	<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Gagal!</strong> ReCaptcha salah atau belum terverifikasi.</div>
	      <?php endif; ?>
	    <?php endif; ?>
	    
	    <div class="alert alert-info text-right" role="alert"><strong>Anda sudah terdaftar? tetapi belum mendapatkan email berisi QR-Code?</strong> <a href="/allegria/qrcode" class="btn btn-info btn-small"><strong>Klik Disini!</strong></a></div>

		<h3 class="page-header">Allegria : Agent Gathering Registration Form</h3>

		<form method="POST" action="">

			<div class="form-group">
				<label for="inpFname">First Name</label>
				<input type="text" class="form-control" id="inpFname" name="inpFname" placeholder="Nama depan Anda" required="required">
			</div>
			
			<div class="form-group">
				<label for="inpLname">Last Name</label>
				<input type="text" class="form-control" id="inpLname" name="inpLname" placeholder="Nama Belakang Anda" required="required">
			</div>
			
			<div class="form-group">
				<label for="inpKTP">KTP</label>
				<input type="text" class="form-control" id="inpKTP" name="inpKTP" placeholder="Nomor KTP Anda" required="required">
			</div>
			
			<div class="form-group">
				<label for="inpBirthdate">Birthdate</label>
				<div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control datepicker" placeholder="Tanggal Lahir (YYYY-mm-dd)" name=inpBirthdate required="required">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
			</div>

			<div class="form-group">
				<label for="inpEmail">Email address</label>
				<input type="email" class="form-control" id="inpEmail" name="inpEmail" placeholder="Alamat Email" required="required">
			</div>

			<div class="form-group">
				<label for="inpPhone">Phone Number</label>
				<input type="text" class="form-control" id="inpPhone" name="inpPhone" placeholder="Nomor Telephone" required="required" maxlength="15">
				<p class="help-block">Masukan dengan angka saja.</p>
			</div>
			
			<div class="form-group">
    			<label for="inpAddress">Address</label>
    			<textarea id="inpAddress" name="inpAddress" class="form-control" rows="3" required="required"></textarea>
    		</div>

			<div class="form-group">
				<label for="inpFranchise">Master Franchise</label>
				<select class="form-control" id="inpFranchise" name="inpFranchise" placeholder="" required="required">
				  <option value="Harcourts">Harcourts</option>
				</select>
			</div>

			<div class="form-group">
				<label for="inpOffice">Office Name</label>
				<input type="text" class="form-control" id="inpOffice" name="inpOffice" placeholder="Nama Kantor Agent" required="required">
			</div>
			
			<!--
			<div class="form-group">
				<label for="inpPickup">Pilih Titik Bus Penjemputan</label>
				<label class="radio">
				  <input type="radio" name="inpPickup" id="inpPickup" value="Cibubur"> Cibubur, Mall Ciputra Cibubur
				</label>
				<label class="radio">
				  <input type="radio" name="inpPickup" id="inpPickup" value="Bogor"> Bogor, Area Parkir Depan Masjid Alumni IPB - Botani Square
				</label>
				<label class="radio">
				  <input type="radio" name="inpPickup" id="inpPickup" value="Kelapa Gading"> Kelapa Gading, Belakang Mall Artha Gading
				</label>
				<label class="radio">
				  <input type="radio" name="inpPickup" id="inpPickup" value="Sumarecon Bekasi"> Bekasi, Area Parkir Depan Bandar Jakarta Summarecon Bekasi
				</label>
				<label class="radio">
				  <input type="radio" name="inpPickup" id="inpPickup" value="TIDAK IKUT BUS" checked="checked"> TIDAK IKUT BUS / Bawa kendaraan pribadi
				</label>
			</div>
			-->
			
			<!--
			<div class="form-group">
				<label for="inpRecaptha">Recaptcha</label><br />
				<label><small><em>Klik kotak verifikasi untuk menunjukan bahwa Anda bukan Spammer, dan isi verifikasi sesuai petunjuk.</em></small></label>
				 	<div id="g-captcha"></div>
				</div>
			</div>
			-->

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary btn-blocked">Register</button>
			</div>
		</form>
	</div>
</div>

<div class="row" id="footer">
	<div class="col-md-12 col-xs-12 text-center text-muted">
		<small>© PT.Projek Properti Internasional. 2018.</small>
	</div>
</div>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
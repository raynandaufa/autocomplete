<?php
/* @var $this SiteController */
$this->pageTitle='Get Your QR-Code - Allegria';

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
	      	<div class="alert alert-danger text-right"><strong>Gagal!</strong> Email ini belum terdaftar. Segera daftar diri Anda!
	      	    <a href="/opuspark/registration" class="btn btn-success btn-small"><strong>Pendaftaran</strong></a>
	        </div>
	      <?php elseif ($status=='103'): ?>
	      	<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
	      	    <strong>Error!</strong> Terdapat masalah dengan pendaftaran Anda, QR-Code gagal dibuat. Mohon informasikan kepada tim PROJEK atau email ke <strong>administrator@projek.id</strong> dengan menyertakan email pendaftaran Anda.
	      	</div>
	      <?php endif; ?>
	    <?php endif; ?>

		<h3 class="page-header">QR-Code Viewer</h3>
		<h5>Masukkan Email yang Anda gunakan saat pendaftaran Allegria Agent Gathering : </h5>

		<form method="POST" action="">

			<div class="form-group">
				<label for="inpEmail">Email address</label>
				<input type="email" class="form-control" id="inpEmail" name="inpEmail" placeholder="Alamat Email" required="required">
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary btn-blocked">Get Your QR-Code</button>
			</div>
			
		</form>
	</div>
</div>

<div class="row" id="footer">
	<div class="col-md-12 col-xs-12 text-center text-muted">
		<small>© PT.Projek Properti Internasional. 2018.</small>
	</div>
</div>

</script>
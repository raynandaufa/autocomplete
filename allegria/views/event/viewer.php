<?php
/* @var $this SiteController */
$this->pageTitle='QR-Code Reader - Allegria';

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

<div class="row" id="content" style="padding: 10px;">
    <div class="col-md-12 col-xs-12">
        <form method="POST" action="">

			<div class="form-group">
				<label for="inpEmail">Masukkan kode QR-Code menggunakan scanner :</label>
				<input type="text" class="form-control" id="inpCode" name="inpCode" placeholder="QR-Code" required="required">
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary btn-blocked">Submit</button>
			</div>
		</form>
	</div>
	
	<div class="col-md-12 col-xs-12">
	    
	    <?php if (isset($status)): ?>
	      <?php if ($status=='100'): ?>
	        <div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Berhasil!</strong> Data pendaftar ditemukan dan terabsen.</div>
	      <?php elseif ($status=='101'): ?>
	        <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Gagal!</strong> Semua bidang wajib diisi.</div>
	      <?php elseif ($status=='102'): ?>
	        <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Gagal!</strong> Data pendaftar tidak ditemukan.</div>
	      <?php endif; ?>
	    <?php endif; ?>
	    
	    <form class="form-horizontal" method="post" action="">
	        <h3 class="page-header"><strong>Detail Pendaftar :</strong></h3>
	        
    		<div class="form-group" style="margin-bottom:0;">
                <label class="col-sm-4 control-label">Nama :</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $registered->fname . ' ' . $registered->lname; ?></p>
                </div>
            </div>
            
            <div class="form-group" style="margin-bottom:0;">
                <label class="col-sm-4 control-label">No. KTP :</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $registered->ktp; ?></p>
                </div>
            </div>
            
            <div class="form-group" style="margin-bottom:0;">
                <label class="col-sm-4 control-label">Master Franchise :</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $registered->master_franchise; ?></p>
                </div>
            </div>
            
            <div class="form-group" style="margin-bottom:0;">
                <label class="col-sm-4 control-label">Office :</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $registered->office; ?></p>
                </div>
            </div>
        </form>
            
        </div>
		
        
	</div>
</div>

<div class="row" id="footer">
	<div class="col-md-12 col-xs-12 text-center text-muted">
		<small>© PT.Projek Properti Internasional. 2018.</small>
	</div>
</div>

<script>
    $( "#inpCode" ).focus();
</script>
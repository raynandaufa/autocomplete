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

<div class="row" id="content" style="padding: 10px;">
	<div class="col-md-12 col-xs-12">
		
		<?php if(count($registered->qrcode)): ?>
    		<h4>Data pendaftaran Anda berhasil ditemukan!</h4>
    		<p>Atas Nama : <strong><?php echo $registered->fname . ' ' . $registered->lname; ?></strong></p>
    		<p>QR-Code Anda :</p>
    		<p class="text-center"><img src="http://www.barcode-generator.org/phpqrcode/getCode.php?cht=qr&chl=<?php echo $registered->qrcode; ?>&chs=250x250&choe=UTF-8&chld=L|0" style="max-width:100%;"></p>
    		<p class="text-center">Silahkan simpan gambar QR-Code Anda, agar dapat dengan mudah Anda tunjukan saat registrasi ulang ditempat acara.</p>
        <?php endif; ?>
        
	</div>
	
	<div class="col-md-12 col-xs-12 text-center">
	    <a class="btn btn-warning btn-blocked" href="/allegria/qrcode">&lsaquo;&lsaquo; Back</a>
	</div>
</div>

<div class="row" id="footer">
	<div class="col-md-12 col-xs-12 text-center text-muted">
		<small>© PT.Projek Properti Internasional. 2018.</small>
	</div>
</div>
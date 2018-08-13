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
	    
		<h3 class="page-header">Data Anda berhasil disimpan!</h3>
		
		<?php if(count($register->qrcode)): ?>
    		<p>QR-Code Anda :</p>
    		<p class="text-center"><img src="http://www.barcode-generator.org/phpqrcode/getCode.php?cht=qr&chl=<?php echo $register->qrcode; ?>&chs=250x250&choe=UTF-8&chld=L|0" style="max-width:100%;"></p>
    		<p class="text-center">Silahkan simpan gambar QR-Code Anda, agar dapat dengan mudah Anda tunjukan saat registrasi ulang ditempat acara.</p>
        <?php endif; ?>
        
		<p class="lead">Terima kasih, Kami telah mengirimkan email bukti pendaftaran Anda.</p>
		<p>Di email tersebut terdapat QR-Code Anda yang akan digunakan pada saat acara Agent Gathering Allegria, dan Anda otomatis terdaftar di aplikasi PROJEK. Jangan lupa, download/update selalu aplikasi PROJEK di handphone Anda melalui PlayStore atau AppStore.</p>
		
		<p class="text-muted">Happy Selling :)</p>
	</div>
</div>

<div class="row" id="footer">
	<div class="col-md-12 col-xs-12 text-center text-muted">
		<small>© PT.Projek Properti Internasional. 2018.</small>
	</div>
</div>
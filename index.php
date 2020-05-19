<?php session_start(); ob_start(); ?>
<?php include_once 'baglantilar/database.php'; ?>
<?php include_once 'baglantilar/fonksiyonlar.php';?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $ayarlargoster['site_title']; ?></title>
	<link rel="shortcut icon" type="image/png" href="<?=$h->get['base_url']?>/whatsapprandevu/admin/assets/resim/favicon/<?php echo $ayarlargoster['site_favicon']; ?>"/>
	<meta name="description" content="<?php echo $ayarlargoster['site_description']; ?>">
	<meta name="keywords" content="<?php echo $ayarlargoster['site_keywords']; ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
	<link rel="stylesheet" href="<?=$h->get['base_url']?>/whatsapprandevu/admin/assets/css/sb-admin.css">
	<link rel="stylesheet" href="<?=$h->get['base_url']?>/whatsapprandevu/admin/assets/css/custom.css">
	<?php echo $ayarlargoster['site_analytics']; ?>
	<link rel="stylesheet" href="<?=$h->get['base_url']?>/whatsapprandevu/admin/assets/css/datepicker.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lumen/bootstrap.css">
</head>
<body id="page-top" class="theme-purple">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<a href="?sayfa=anasayfa" class="navbar-brand" title="Site Slogan">
			<?php echo $ayarlargoster['site_slogan']; ?>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a href="?sayfa=anasayfa" class="nav-link" title="Ana Sayfa"><i class="fa fa-home"></i> Anasayfa <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a href="?sayfa=destekolustur" class="nav-link" title="Destek Talebi"><i class="fas fa-life-ring"></i> Destek Talebi</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 pt-3">
				<?php Duyuru(); ?>
			</div>
			<?php SayfaGetir(); ?>
			
		</div>
		<footer class="sticky-footer2">
			<div class="container my-auto">
				<div class="copyright my-auto">
					<div class="row">
						<div class="col-lg-6 col-sm-12 pt-3">
							<div class="d-flex flex-column">
								<p><b style="width:120px;display: inline-block;">Telefon</b>: <?php echo $ayarlargoster['site_telefon']; ?></p>
								<p><b style="width:120px;display: inline-block;">Fax</b>: <?php echo $ayarlargoster['site_fax']; ?></p>
								<p><b style="width:120px;display: inline-block;">Çalışma Saatleri</b>: <?php echo $ayarlargoster['site_calsaat']; ?></p>
								<p><b style="width:120px;display: inline-block;">E-posta</b>: <?php echo $ayarlargoster['site_eposta']; ?></p>
								<p><b style="width:120px;display: inline-block;">Adres</b>: <?php echo $ayarlargoster['site_adres']; ?></p>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 pt-3  text-right">
							<span><?php echo $ayarlargoster['site_copright']; ?></span>
							<div class="sosyal">
								<a href="<?php echo $ayarlargoster['site_facebook']; ?>" title="Facebook'tan Takip Et"><span>Facebook</span></a>
								<a href="<?php echo $ayarlargoster['site_twitter']; ?>" title="Twitter'dan Takip Et"><span>Twitter</span></a>
								<a href="<?php echo $ayarlargoster['site_instagram']; ?>" title="İnstagram'dan Takip Et"><span>İnstagram</span></a>
								<a href="<?=$h->get['base_url']?>/whatsapprandevu/admin" title="Admin Paneli"><span>Admin</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<a href="#page-top" class="scroll-to-top rounded" title="Yukarı Çık">
			<i class="fas fa-angle-up"></i>
		</a>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="<?=$h->get['base_url']?>/whatsapprandevu/admin/assets/js/sb-admin.min.js"></script>
		<script src="<?=$h->get['base_url']?>/whatsapprandevu/admin/assets/js/custom.js"></script>
		<script src="<?=$h->get['base_url']?>/whatsapprandevu/admin/assets/js/datepicker.js"></script>
		<script>
			$('.datepicker').datepicker({
				todayBtn: "linked",
				clearBtn: true,
				language: "tr"
			});


			function run() {
				document.getElementById("fiyat").value = document.getElementById("select").value;
				document.getElementById("hizmet").value = document.getElementById("select").value;
			}

			function run() {
				var select = document.getElementById("select"),
				option = select.options[select.selectedIndex];
				document.getElementById("fiyat").value = option.id;
				document.getElementById("hizmet").value = option.innerHTML;
			}

		</script>


	</body>
	</html>
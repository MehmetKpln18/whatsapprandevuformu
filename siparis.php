<?php session_start(); ob_start(); ?>
<?php include 'admin/baglantilar/database.php'; ?>
<?php
if (isset($_POST["RandevuAl"])) {
  date_default_timezone_set('Europe/Istanbul');
  $adsoyad = $_POST['adsoyad'];
  $telefon = $_POST['telefon'];
  $hizmet = $_POST['hizmet'];
  $fiyat = $_POST['fiyat'];
  $randevu_tarihi = $_POST['randevu_tarihi'];
  $randevu_saati = $_POST['randevu_saati'];
  $aciklama = $_POST['aciklama'];
  $yoneticicevap = 'Yeni';
  $durum = '1';
  $createdAt = date('Y-m-d H:i:s');
  $gonder = $conn->prepare("INSERT INTO randevular SET adsoyad='$adsoyad', telefon='$telefon', hizmet='$hizmet', fiyat='$fiyat', randevu_tarihi='$randevu_tarihi', randevu_saati='$randevu_saati', aciklama='$aciklama', yoneticicevap='$yoneticicevap', durum='$durum', createdAt='$createdAt'");
  $gonder->execute();
  if($gonder){
    $mesaj = '<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Randevu başarı ile oluşturuldu.</strong>
    </div>';
  }else{
    $mesaj = '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Talep başarısız !</strong>
    </div>';
  }
}
?>

<?php 
$vericek = $conn -> prepare("SELECT * FROM yoneticiler where id = 1");
$vericek->bindParam('1', $_SESSION['yonetici']);
$vericek-> execute();
$veriyigoster = $vericek -> fetch(PDO::FETCH_ASSOC);
?>
<?php

$adsoyad = $_POST['adsoyad'];
$telefon = $_POST['telefon'];
$hizmet = $_POST['hizmet'];
$randevu_tarihi = $_POST['randevu_tarihi'];
$randevu_saati = $_POST['randevu_saati'];
$aciklama = $_POST['aciklama'];

?>

<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
if ($iphone || $android || $palmpre || $ipod || $berry == true)
{
  header("Location: https://api.whatsapp.com/send?phone=9" .$veriyigoster['telefon']. "&text=Merhaba ben *$adsoyad*. $hizmet hizmetinizden yararlanmak için $randevu_tarihi - $randevu_saati tarihinde randevu talep ediyorum.%0ATelefon : $telefon%0ANot - $aciklama");
  echo "<script>window.location='https://api.whatsapp.com/send?phone=99" .$veriyigoster['telefon']. "&text=Merhaba ben *$adsoyad*. $hizmet hizmetinizden yararlanmak için $randevu_tarihi - $randevu_saati tarihinde randevu talep ediyorum.%0ATelefon : $telefon%0ANot - $aciklama'</script>";
}
else {
  header("Location: https://web.whatsapp.com/send?phone=9" .$veriyigoster['telefon']. "&text=Merhaba ben *$adsoyad*. $hizmet hizmetinizden yararlanmak için $randevu_tarihi - $randevu_saati tarihinde randevu talep ediyorum.%0ATelefon : $telefon%0ANot - $aciklama");
  echo "<script>window.location='https://web.whatsapp.com/send?phone=9" .$veriyigoster['telefon']. "&text=Merhaba ben *$adsoyad*. $hizmet hizmetinizden yararlanmak için $randevu_tarihi - $randevu_saati tarihinde randevu talep ediyorum.%0ATelefon : $telefon%0ANot - $aciklama'</script>";
}
?>
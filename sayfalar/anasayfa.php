<?php session_start(); ob_start(); ?>
<?php include 'baglantilar/database.php'; ?>
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
$vericek = $conn -> prepare("SELECT * FROM ayarlar where id = 1");
$vericek->bindParam(1, $_GET['id']);
$vericek-> execute();
$veriyigoster = $vericek -> fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
  <div class="row mb-5"">
    <div class="col-lg-12 mb-5">
      <form class="user" action="" name="Form1" method="post">
        <div class="message"></div>
        <?php if(!empty($mesaj)): ?>
          <p><?= $mesaj ?></p>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-3 col-form-label">Ad Soyad</label>
              <div class="col-9">
                <input type="text" name="adsoyad" class="form-control" value="Mehmet Kaplan" autocapitalize="off" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3 col-form-label">Telefon</label>
              <div class="col-9">
                <input type="text" name="telefon" class="form-control" value="05445444444" autocapitalize="off" required>
              </div>
            </div>
            <div class="form-group row row">
              <label class="col-3 col-form-label">Hizmet</label>
              <div class="col-9">
                <select id="select" class="form-control" onchange="run()" required>
                  <option>Hizmet Seçiniz</option>
                  <?php
                  foreach($conn->query("SELECT * FROM hizmetler") as $cikti) {
                    echo "<option id='".$cikti['urunfiyat']."' >".$cikti['urunbaslik']."</option>";
                  }
                  ?>
                  <input type='hidden' name='fiyat' id='fiyat' />
                  <input type='hidden' name='hizmet' id="hizmet">
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-date-input" class="col-3 col-form-label">Tarih</label>
              <div class="col-9">
                <input class="form-control" name="randevu_tarihi" type="date" value="<?php echo date("Y-m-d"); ?>" id="example-date-input" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3 col-form-label">Saat</label>
              <div class="col-9">
                <select class="form-control" name="randevu_saati" id="exampleFormControlSelect1">
                  <option value="8:30">8:30</option>
                  <option value="9:00">9:00</option>
                  <option value="9:30">9:30</option>
                  <option value="9:00">10:00</option>
                  <option value="11:30">11:30</option>
                  <option value="13:00">13:00</option>
                  <option value="14:30">14:30</option>
                  <option value="15:00">15:00</option>
                  <option value="15:30">15:30</option>
                  <option value="16:00">16:00</option>
                  <option value="16:30">16:30</option>
                  <option value="17:00">17:00</option>
                  <option value="17:30">17:30</option>
                  <option value="18:00">18:00</option>
                  <option value="18:30">18:30</option>
                  <option value="19:00">19:00</option>
                  <option value="19:30">19:30</option>
                  <option value="20:00">20:00</option>
                  <option value="20:30">20:30</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row row">
              <label class="col-3 col-form-label">Açıklama</label>
              <div class="col-9">
                <input type="text" name="aciklama" class="form-control" value="Açıklama" autocapitalize="off" required>
              </div>
            </div>
            <div class="form-group">
              <button id="RandevuAl" type="submit" name="RandevuAl" class="btn btn-block btn-success btn-round"  onclick="OnButton1();">
                <i class="fab fa-whatsapp font-weight-normal"></i> Randevu Oluştur !
              </button>
            </div>
          </div>
          <div class="col-md-12">

          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<script language="javascript">
  function OnButton1()
  {
    document.Form1.action = "siparis.php"
    document.Form1.target = "iframe1";
    document.Form1.submit();
    return true;
  }
</script>

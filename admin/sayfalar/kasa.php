<?php session_start(); ob_start(); ?>
<?php include 'baglantilar/database.php'; ?>
<?php
if( isset($_SESSION['yonetici']) && !empty($_SESSION['yonetici']) ){
  $records = $conn->prepare('SELECT * FROM yoneticiler WHERE id = :id');
  $records->bindParam(':id', $_SESSION['yonetici']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $user = NULL;
  if( count($results) > 0){
    $user = $results;
  }
}
else
{
  header("Location: giris.php");
  die();
}
?>

<?php
if (isset($_GET['id'])) {
  $numaras = $_GET['id']; 
  $sil = $conn -> prepare("DELETE FROM destektalepleri where id = :id");
  $sil->bindParam(':id', $_GET['id']);
  $sil-> execute();
  if($sil){
    echo '<meta http-equiv="refresh" content="2;URL=?sayfa=destektalepleri">
    <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Ürün Başarı İle Silindi. 2 Saniye İçinde Yönlendiriliyorsunuz</strong>
    </div>';
  }else{
    echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Hata Oluştu !</strong>
    </div>';
  }  
} 
?> 
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?sayfa=anasayfa">Ana Sayfa</a></li>
    <li class="breadcrumb-item active">Kasa</li>
  </ol>
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-3">
      <div class="alert alert-info">
        <?php
        $sorgu = $conn->prepare("SELECT COUNT(*) FROM randevular WHERE yoneticicevap='Tamamlanmış'");
        $sorgu->execute();
        $say = $sorgu->fetchColumn();
        echo 'Sistemde <b>'.$say.'</b> hizmet bulunmaktadır. ';
        ?>
        <?php 
        $query = $conn -> query("SELECT SUM(fiyat) FROM randevular WHERE yoneticicevap='Tamamlanmış'")->fetch(PDO::FETCH_ASSOC); 
        $row = $query; 
        echo '<div class="float-right mb-3">YAPILAN HİZMETLERİN TOPLAM FİYATI <span class="btn-success btn-sm font-weight-bold">'.$row['SUM(fiyat)'].'</span> TL</div>';
        ?>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
          <thead>
            <th>Adı Soyadı</th>
            <th>Telefon</th>
            <th>Hizmet</th>
            <th>Fiyat</th>
          </thead>
          <tbody>
            <?php
            $verial1 = $conn -> prepare("SELECT * FROM randevular");
            $verial1-> execute();
            while ($randevular = $verial1 -> fetch(PDO::FETCH_ASSOC)){
              if($randevular["yoneticicevap"]=='Tamamlanmış') {
                $sayi1  = $randevular['fiyat'];
                echo '
                <td>'.$randevular['adsoyad'].'</td>
                <td>'.$randevular['telefon'].'</td>
                <td>'.$randevular['hizmet'].'</td>
                <td class="bg-secondary text-white">'.$randevular['fiyat'].' TL</td>
                </tr>';
              }
            }
            ?>
          </tbody>
          <tfoot>

          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
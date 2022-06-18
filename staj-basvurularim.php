<?php
  $servername = "localhost";
  $username = "sedatef1_root";
  $password = "963852741Sedatefe";
  $db = "sedatef1_projeOdevi";


  $con = mysqli_connect($servername, $username, $password, $db);
				$con->set_charset("utf8");
				if($con === false){
					die("ERROR: Veritabanı bağlantısı başarısız.. " . $con->connect_error);
				}



    $kontrolIlan = ("select * from stajBasvurulari ");
    $kontrolIlanSQL = mysqli_query ($con, $kontrolIlan);


?>

<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/2440bc6803.js" crossorigin="anonymous"></script>

    <title>SBİP - Panel</title>
  </head>
  <body>

    
    <header class="ust-navbar">

      <div class="container">
        <div class="row align-items-center navigasyon-yuvarla">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 logo-alan"><a href="index.php" class="gri-yazi mb-0">Staj Bilgi İşlem Paneli</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="navigasyon-alan position-relative text-right">

              <ul class="menu-alanlar js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php"><span>Anasayfa</span></a></li>
                <li><a href="k-bilgileri.php"><span>Öğrenci Bilgileri</span></a></li>
                <li><a href="sirketler.php"><span>Stajlar</span></a></li>
                <li><a href="ayarlar.php"><span>Ayarlar</span></a></li>
              </ul>
            </nav>
          </div>
          </div>

        </div>
      </div>
      
    </header>

    <div class="ana-bolum" style="background-image: url('images/banner1.jpeg'); border-radius: 0px 0px 10px 10px;"></div>

    <div class="row-icerik">
      <h5 style="padding: 10px; font-weight: bold; margin-bottom: -5px;">Mevcut Başvurularım</h5>
      <table style="margin-top:30px; margin-left: 5px;">
      <tr>
            <td><strong>İsim ve Soyisim</strong></td>
            <td><strong>İş Tanımı</strong></td>
            <td><strong>Staj Günü</strong></td>
            <td><strong>Staj Durumu</strong></td>
            <td><strong>Staj Tarihi</strong></td>
            <td><strong>İşlem</strong></td>
        </tr>
       <?php 
       
       if ($kontrolIlanSQL-> num_rows > 0) {
        while ($row = $kontrolIlanSQL-> fetch_assoc()) {
            $ilanID = $row["id"];
            $isimSoyisim = $row["isimSoyisim"];
            $isTanim = $row["isTanim"];
            $stajGun = $row["stajGun"];
            $tarih = $row["tarih"];
            $durum = $row["durum"];

            echo'
            <tr>
                <td>'.$isimSoyisim.'</td>
                <td>'.$isTanim.'</td>
                <td>'.$stajGun.'</td>
                <td>'.$durum.'</td>
                <td>'.$tarih.'</td>
                <td><a href="staj-sil.php?id='.$ilanID.'"><button type="button" class="button-erisim" style="margin-left: 10px;">İptal</button></a></td>
            </tr>
            ';
        }
     }
       
       ?>
    </table>
        



    </div>
  
    <div class="footer-alan">
      <footer>
          <ul class="liste-blokinline">
              <li class="footer-itemlar"><a href="index.php">Anasayfa</a></li>
              <li class="footer-itemlar"><a href="#">Bilgiler</a></li>
              <li class="footer-itemlar"><a href="sirketler.php">Stajlar</a></li>
              <li class="footer-itemlar"><a href="k-bilgileri">Gizlilik Pol.</a></li>
              <li class="footer-itemlar"><a href="#">Çerezler</a></li>
          </ul>
          <p class="haklar">SBİP © 2022</p>
      </footer>
  </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
  </body>
</html>
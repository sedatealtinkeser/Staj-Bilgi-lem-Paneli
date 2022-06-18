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


  if(isset($_POST['submit'])){
    $isimSoyisim = $_POST['isimSoyisim'];
    $isTanim = $_POST['isTanim'];
    $stajGun = $_POST['stajGun'];
    $stajTanit = $_POST['stajTanit'];

    $kontrolIlan = ("select * from stajBasvurulari WHERE isimSoyisim='".$isimSoyisim."' ");
    $kontrolIlanSQL = mysqli_query ($con, $kontrolIlan);
    $kontrolIlanFetch = mysqli_fetch_array($kontrolIlanSQL);

    if($kontrolIlanFetch[0] >= 1){
      $hataMesaji = "Zaten bir bekleyen staj başvurunuz var, yenisini yollayamazsınız.";
      $hataTuru = "C";
    }
    
    else {
      $sqlFormEkleme = ("insert into stajBasvurulari (isimSoyisim, isTanim, stajGun, stajTanit) values ('".$isimSoyisim."','".$isTanim."','".$stajGun."','".$stajTanit."')  ");
      $sqlFormQua = mysqli_query($con,$sqlFormEkleme);
      if($sqlFormQua){
        $formDurum = "B";
      }
    }
    
  }

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
      <h5 style="padding: 10px; font-weight: bold; margin-bottom: -5px;">Yeni Staj Başvurusu</h5>
        <?php if($hataTuru === "C") { echo "<h5 style='padding: 10px; font-weight: bold; margin-bottom: -5px; font-size: 13px;'>'".$hataMesaji."'</h5>";  }
        else if($formDurum === "B") { echo "<h5 style='padding: 10px; font-weight: bold; margin-bottom: -5px; font-size: 13px;'>Staj arama başvurunuz gönderilmiştir.</h5> "; }
        ?>
        <form class="form-giris" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
             <label>İsim ve Soyisim:</label><br>
             <input type="text" name="isimSoyisim"><br>

             <label>İş Tanımınız:(yazılım vs.)</label><br>
             <input type="text" name="isTanim"><br>

             <label>Staj Süreniz:(sadece sayı)</label><br>
             <input type="text" name="stajGun"><br>

             <label>Kendinizi Tanıtın:</label><br>
             <textarea rows="4" cols="55" name="stajTanit"></textarea><br>

             <input class="button-erisim" type="submit" value="Gönder" name="submit">
        </form>



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
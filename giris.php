<?php
	ob_start();
	session_start();
	$servername = "localhost";
	$username = "sedatef1_root";
	$password = "963852741Sedatefe";
	$db = "sedatef1_projeOdevi";
  
  
	$con = mysqli_connect($servername, $username, $password, $db);
				  $con->set_charset("utf8");
				  if($con === false){
					  die("ERROR: Veritabanı bağlantısı başarısız.. " . $con->connect_error);
				  }

	if(count($_POST)>0) {
		$kadis = $_POST["kadi"];
		$sifres = $_POST["sifre"];
		$msg = "";
		$sorgucek=("select * from ogrenciBilgileri where girisAdi='".$kadis."' and sifre='".$sifres."'");
		$res=mysqli_query($con,$sorgucek);
		$row = mysqli_fetch_array($res);
			if(is_array($row)) {
				$_SESSION["login"] = "true";
				header("Location:index.php");
			}

				else {
					$msg = "Yanlış Kullanıcı Adı veya Şifre!";
				}

	 }

?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<title>SBİP - Giriş Yap</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<span class="login100-form-title">
						Giriş Yap
					</span>
	 				<?php echo $msg; ?>
					<div class="wrap-input100 validate-input" data-validate = "Kullanıcı Adı Zorunludur">
						<input class="input100" type="text" name="kadi" placeholder="Kullanıcı Adı">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Şifre Girmek Zorunludur">
						<input class="input100" type="password" name="sifre" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							GİRİŞ
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	

	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>

</body>
</html>
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

session_start();
session_destroy();
header("location: giris.php");
?>
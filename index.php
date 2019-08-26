<?php 
	session_start();
	if (isset($_SESSION["kadi"])) {
		header("Location: chat.php");
		exit;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giriş</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div align="center" class="col-sm-12 col-md-12">
		<br>
		<br>
		<br>
		<h2>GİRİŞ</h2>
		<br>
		<form action="islem.php" method="POST">
			<input type="text" name="kadi" placeholder="Kullanıcı Adı...">
			<br>
			<br>
			<input type="password" name="sifre" placeholder="Şifre...">
			<br>
			<br>
			<button name="giris" class="btn btn-success">Giriş</button>
			<?php if ($_GET["kayit"]=="basarili") {
				echo "</br></br>Kayıt Olundu";
			}
			if ($_GET["giris"]=="yapilmadi") {
			 	echo "</br></br>Kullanıcı Adı Veya Şifre Yanlış";
			 } 
			?>
		</form>
		<br>
		<a href="kayit.php" style="text-decoration: none;">Kayıt Ol</a>
	</div>
</body>
</html>
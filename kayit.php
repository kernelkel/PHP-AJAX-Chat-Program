<?php 
include 'baglan.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kayıt Ol</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div align="center">
		<h2>Kayıt Ol</h2>
		<br>
		<form action="islem.php" method="POST">
			<input type="text" name="kadi" placeholder="Kullanıcı Adı..." required="">
			<br>
			<br>
			<input type="password" name="sifre" placeholder="Şifre..." required="">
			<br>
			<br>
			<button name="kayit_ol" class="btn btn-success">Kayıt Ol</button>
		</form>
	</div>
</body>
</html>
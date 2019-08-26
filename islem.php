<?php
include 'baglan.php';
session_start();

if (isset($_POST["giris"])) {
	$kaydet=$veritabanı->prepare("SELECT * from kullanici where BINARY kadi=:kullanici_adi and sifre=:kullanici_sifre");
	$kaydet->execute(array(
		'kullanici_adi'=>$_POST["kadi"],
		'kullanici_sifre'=>$_POST["sifre"]
	));
	$sonuc=$kaydet->rowCount();

	if ($sonuc) {
		$_SESSION["kadi"]=$_POST["kadi"];
		header("Location:chat.php");
		exit;
	}
	else {
		header("Location: index.php?giris=yapilmadi");
		exit;
	}
}

$kaydet=$veritabanı->prepare("INSERT INTO mesajlar SET mesaj=:mesaj,kadi=:kadi");
$sonuc=$kaydet->execute(array(
	'mesaj'=>$_POST["mesaj"],
	'kadi'=>$_SESSION["kadi"]
));

$kaydet2=$veritabanı->prepare("SELECT * from mesajlar");
$kaydet2->execute();


while($liste_goster=$kaydet2->fetch(PDO::FETCH_ASSOC)){
	echo htmlspecialchars($liste_goster["kadi"].":".$liste_goster["mesaj"]."\n");
}


if (isset($_POST["kayit_ol"])) {
	$kaydet=$veritabanı->prepare("INSERT INTO kullanici SET kadi=:kadi,sifre=:sifre");
	$sonuc=$kaydet->execute(array(
		'kadi'=>$_POST["kadi"],
		'sifre'=>$_POST["sifre"]
	));

	if ($sonuc) {
		header("Location:index.php?kayit=basarili");
		exit;
	}
	else {
		header("Location:index.php?kayit=basarisiz");
		exit;
	}
}
?>
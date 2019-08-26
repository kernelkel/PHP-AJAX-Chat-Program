<?php 
	include 'baglan.php';
	session_start();
	if (!isset($_SESSION["kadi"])) {
		header("Location: index.php");
		exit;
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Chat</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 </head>
 <body>
 	<div align="center" class="col-12">
 		<br>
 		<br>
		<textarea readonly="" class="col-12" style="width: 500px; height: 350px;" id="mesaj_alani">
			
		</textarea>
	 	<br>
	 	<br>
	 	<input type="text" onkeydown="enter(event.keyCode)" id="mesaj" name="mesaj" placeholder="Mesajınızı Yazınız...">
	 	<br>
	 	<br>
	 	<button name="mesaj_gonder" class="btn btn-success" id="mesaj_gonder" onclick="gonder()">Gönder</button>
	 	<br>
	 	<br>
	 	<a href="cikis.php" style="text-decoration: none;">Çıkış Yap</a>
 	</div>
 	<script type="text/javascript">
 		setInterval("yenile()",250);
 		function enter(event) {
		    if (event == 13) {
		        document.getElementById("mesaj_gonder").click();
		    }
		}	

 		function yenile(){
 			xhttp = new XMLHttpRequest();
 			xhttp.open("GET","islem.php",true);
 			xhttp.send()

 			xhttp.onreadystatechange=function(){
 				if (this.status==200 && this.readyState==4) {
 					document.getElementById("mesaj_alani").innerHTML=this.responseText;
 				}
 			}
 		}
		
 		function gonder() {
 			var mesaj = document.getElementById("mesaj").value;
 			if (mesaj == "") {
 				alert("Mesajınızı Yazınız");
 			}
 			else {
	 			document.getElementById("mesaj").value="";

	 			xhttp = new XMLHttpRequest();
	 			xhttp.open("POST","islem.php",true);
	 			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 			xhttp.send("mesaj="+mesaj);
	 			
	 			xhttp.onreadystatechange=function(){
	 				if (this.status==200 && this.readyState==4) {
	 					document.getElementById("mesaj_alani").innerHTML=this.responseText;
	 				}
	 			} 				
 			}
 		}
 	</script>
 </body>
 </html>
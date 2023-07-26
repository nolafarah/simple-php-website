<?php
	session_start(); // Start the session
?>

<html>
<head>
	<title>PRODUK</title>
</head>
<body>
<?php
	if(function_exists("date_default_timezone_set"))date_default_timezone_set("Asia/Jakarta");

	if(!isset($_GET["mode"]))$_GET["mode"]="";
	if(!isset($_GET["jumlah"]))$_GET["jumlah"]="";

	$con=mysqli_connect("localhost","root","","produk");

if($_GET["mode"]=="tampil"){
	$q=mysqli_query($con,"SELECT * FROM produk WHERE id=$_GET[id]");
	while($h=mysqli_fetch_array($q)){
		echo 
			"<table style='margin:auto;width:80%;font:16px arial'>
				<tr>
					<td style='vertical-align:top;padding:10px'>
						<img src='produk/$h[file]?z=".date("YmdHis")."' style='width:400px;padding:10px'>
						<br>
						<form action='detail.php?mode=keranjang' method='get'>
							<input type=hidden name='id_user' value='$_SESSION[id]'>
							<input type=hidden name='id_produk' value='$h[id]'>
							<input type=hidden name='tanggal' value='".date("Y-m-d H:i:s")."'>
							<input type=hidden name='checked' value='checked'>
							Jumlah: <input type='text' name='jumlah' value=1 style='width:50px'oninput=if(this.value<1)this.value=1>
							<button type='submit' name='mode' value='keranjang'>+ keranjang</button>
						</form>
						<br><br>
						<a href='index.php?mode='><button>Cancel</button></a>
					</td>
					<td style='vertical-align:top;padding:10px'>
						<h2>$h[nama]</h2>
						<h2>Rp ".number_format($h["harga"],0,".",".")."</h2>
						$h[deskripsi]
					</td>
				<tr>
			</table>";
	}
}
elseif($_GET["mode"]=="keranjang"){
	mysqli_query($con,"INSERT INTO keranjang 
		(id_user,id_produk,jumlah,tanggal_pesan,catatan,checked) VALUES
		('$_GET[id_user]','$_GET[id_produk]','$_GET[jumlah]','$_GET[tanggal]','a','checked')");

	header('Location:keranjang.php?mode=keranjang_browse&id='.$_SESSION["id"]);
}
?>
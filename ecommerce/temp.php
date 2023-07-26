<?php
session_start(); // Start the session

$con=mysqli_connect("localhost","root","","produk");

if(!isset($_GET["mode"]))$_GET["mode"]="";
if(!isset($_GET["id"]))$_GET["id"]="";

$q=mysqli_query($con,"SELECT * FROM keranjang WHERE id_keranjang='$_GET[id_keranjang]'");
while($h=mysqli_fetch_array($q)){
	if($_GET["mode"]=="keranjang_checked"){
		mysqli_query($con,
			"UPDATE keranjang SET checked='".($h["checked"]==""?"checked":"")."' 
			WHERE id_keranjang='$_GET[id_keranjang]'");
	}
	if($_GET["mode"]=="keranjang_minus"){
		mysqli_query($con,
			"UPDATE keranjang SET jumlah=$h[jumlah]-1 
			WHERE id_keranjang='$_GET[id_keranjang]'");
	}
	if($_GET["mode"]=="keranjang_plus"){
		mysqli_query($con,
			"UPDATE keranjang SET jumlah=$h[jumlah]+1 
			WHERE id_keranjang='$_GET[id_keranjang]'");
	}
}
header('Location:keranjang.php?mode=keranjang_browse&id='.$_SESSION["id"]);

?>
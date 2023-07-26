<?php
	
	include("config.php");
	if(isset($_GET['id'])){
	
	//ambil id dari query string
	
	$id = $_GET['id'];
	
	//buat query hapus
	$sql = "DELETE FROM identitas_ktp WHERE id=$id";
	$query = mysqli_query($db, $sql);
	
	
	//apakah query hapus berhasil
	if($query){
		header('Location: list-identitas.php');
	}
	else{
		die("Gagal menghapus.");
	}
}
else{
	die("Akses dilarang!");
}
	
?>
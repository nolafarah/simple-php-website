<?php

include("config.php");

//cek apakah tombol submit sudah diklik atau belum
if(isset($_POST['submit'])){
	
	//ambil data dari formulir
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jk = $_POST['jenis_kelamin'];
	$goldar = $_POST['goldar'];
	$alamat = $_POST['alamat'];
	$provinsi = $_POST['provinsi'];
	$kota = $_POST['kota'];
	$rt = $_POST['rt'];
	$rw = $_POST['rw'];
	$kelurahan = $_POST['kelurahan'];
	$kecamatan = $_POST['kecamatan'];
	$pos = $_POST['kode_pos'];
	$agama = $_POST['agama'];
	$perkawinan = $_POST['status_perkawinan'];
	$pekerjaan = $_POST['pekerjaan'];
	$kewarganegaraan = $_POST['kewarganegaraan'];
	$berlaku = $_POST['tgl_berlaku'];
	
	//buat query
	$sql = "INSERT INTO identitas_ktp (nik, nama, tempat_lahir, tgl_lahir, jenis_kelamin, goldar, alamat, provinsi, kota, rt, rw, kelurahan, 
	kecamatan, kode_pos, agama, status_perkawinan, pekerjaan, kewarganegaraan, tgl_berlaku) VALUES ('$nik', '$nama', '$tempat_lahir', 
	'$tgl_lahir', '$jk', '$goldar', '$alamat', '$provinsi', '$kota', '$rt', '$rw', '$kelurahan', '$kecamatan', '$pos', '$agama', 
	'$perkawinan', '$pekerjaan', '$kewarganegaraan', '$berlaku')";
	$query = mysqli_query($db, $sql);
	// var_dump($sql); die();
	
	//apakah query berhasil
	if($query){
		//jika berhasil alihkan ke halaman index.php dengan status=success
		header('Location: index.php?data=success');
	}
	else{
		//jika gagal alihkan ke halaman index.php dengan status gagal
		header('Location: index.php?data=gagal');
	}
}
else {
	die("Akses dilarang!");
}

?>
<?php

include ("config.php");

//cek apakah tombol daftar sudah diklik atau belum
if(isset($_POST['simpan'])){
	
	//ambil data dari formulir
	$id = $_POST['id'];
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
	
	//buat query update
	$sql = "UPDATE identitas_ktp SET nik='$nik', nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jk', 
	goldar='$goldar', alamat='$alamat', provinsi='$provinsi', kota='$kota', rt='$rt', rw='$rw', kelurahan='$kelurahan', 
	kecamatan='$kecamatan', kode_pos='$pos', agama='$agama', status_perkawinan='$perkawinan', pekerjaan='$pekerjaan', 
	kewarganegaraan='$kewarganegaraan', tgl_berlaku='$berlaku' WHERE id=$id";
	$query = mysqli_query($db, $sql);
	
	//apakah query update berhasil
	if($query){
		//kalau berhasil alihkan ke halaman list-identitas.php
		header('Location: list-identitas.php');
	}
	else{
	//kalau gagal tampilkan pesan
	die("Gagal menyimpan perubahan.");
	}
}
else{
	die("Akses dilarang!");
}
?>
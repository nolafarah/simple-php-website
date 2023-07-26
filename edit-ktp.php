<?php

include("config.php");

//kalau tidak ada id di query string
if(!isset($_GET['id'])){
	header('Location: list-identitas.php');
}

//ambil id dari query string
$id = $_GET['id'];

//buat query untuk ambil data dari database
$sql = "SELECT * FROM identitas_ktp WHERE id=$id";
$query = mysqli_query($db, $sql);
$identitas = mysqli_fetch_assoc($query);

//jika data yang diedit tidak ditemukan
if(mysqli_num_rows($query) < 1){
	die("Data tidak ditemukan.");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Identitas</title>
</head>
<body bgcolor="#CBE6FA">
	<header>
		<h3>Formulir Edit Identitas</h3>
	</header>
	
	<form action="proses-edit-ktp.php" method="POST">
	
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $identitas['id']?>"/>
		
	<p>
		<label for="nik">NIK: </label>
		<input type="text" name="nik" placeholder="Masukkan NIK" value="<?php echo $identitas['nik']?>"/>
	</p>
	<p>
		<label for="nama">Nama: </label>
		<input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $identitas['nama']?>"/>
	</p>
	<p>
		<label for="tempat_lahir">Tempat Lahir: </label>
		<input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $identitas['tempat_lahir']?>"/>
	</p>
	<p>
		<label for="tgl_lahir">Tanggal Lahir: </label>
		<input type="text" name="tgl_lahir" id="tgl_lahir" value="<?php echo $identitas['tgl_lahir']?>"/>
	</p>
	<p>
		<label for="jenis_kelamin">Jenis Kelamin: </label>
		<?php $jk = $identitas['jenis_kelamin']; ?>
		<label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>>Laki-laki</label>
		<label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>>Perempuan</label>
	</p>
	<p>
		<label for="goldar">Gol. Darah: </label>
		<?php $goldar = $identitas['goldar']; ?>
		<select name="goldar">
			<option <?php echo ($goldar == 'A')? "selected": "" ?>>A</option>
			<option <?php echo ($goldar == 'B')? "selected": "" ?>>B</option>
			<option <?php echo ($goldar == 'AB')? "selected": "" ?>>AB</option>
			<option <?php echo ($goldar == 'O')? "selected": "" ?>>O</option>
		</select>
	</p>
	<p>
		<label for="alamat">Alamat: </label>
		<textarea name="alamat"><?php echo $identitas['alamat']?></textarea>
	</p>
	<p>
		<label for="provinsi">Provinsi: </label>
		<input type="text" name="provinsi" placeholder="Masukkan Provinsi" value="<?php echo $identitas['provinsi']?>"/>
	</p>
	<p>
		<label for="kota">Kota: </label>
		<input type="text" name="kota" placeholder="Masukkan Kota" value="<?php echo $identitas['kota']?>"/>
	</p>
	<p>
		<label for="rt">RT: </label>
		<input type="text" name="rt" placeholder="Masukkan RT" value="<?php echo $identitas['rt']?>"/>
	</p>
	<p>
		<label for="rw">RW: </label>
		<input type="text" name="rw" placeholder="Masukkan RW" value="<?php echo $identitas['rw']?>"/>
	</p>
	<p>
		<label for="kelurahan">Kel/Desa: </label>
		<input type="text" name="kelurahan" placeholder="Masukkan Kelurahan" value="<?php echo $identitas['kelurahan']?>"/>
	</p>
	<p>
		<label for="kecamatan">Kecamatan: </label>
		<input type="text" name="kecamatan" placeholder="Masukkan Kecamatan" value="<?php echo $identitas['kecamatan']?>"/>
	</p>
	<p>
		<label for="kode_pos">Kode Pos: </label>
		<input type="text" name="kode_pos" placeholder="Masukkan Kode Pos" value="<?php echo $identitas['kode_pos']?>"/>
	</p>
	<p>
		<label for="agama">Agama: </label>
		<?php $agama = $identitas['agama']; ?>
		<select name="agama">
			<option <?php echo ($agama == 'Islam')? "selected": "" ?>>Islam</option>
			<option <?php echo ($agama == 'Kristen')? "selected": "" ?>>Kristen</option>
			<option <?php echo ($agama == 'Katolik')? "selected": "" ?>>Katolik</option>
			<option <?php echo ($agama == 'Hindu')? "selected": "" ?>>Hindu</option>
			<option <?php echo ($agama == 'Budha')? "selected": "" ?>>Budha</option>
			<option <?php echo ($agama == 'Konghuchu')? "selected": "" ?>>Konghuchu</option>
			<option <?php echo ($agama == 'Atheis')? "selected": "" ?>>Atheis</option>
		</select>
	</p>
	<p>
		<label for="status_perkawinan">Status Perkawinan: </label>
		<?php $perkawinan = $identitas['status_perkawinan']; ?>
		<select name="status_perkawinan">
			<option <?php echo ($perkawinan == 'Belum Kawin')? "selected": "" ?>>Belum Kawin</option>
			<option <?php echo ($perkawinan == 'Kawin')? "selected": "" ?>>Kawin</option>
			<option <?php echo ($perkawinan == 'Cerai Hidup')? "selected": "" ?>>Cerai Hidup</option>
			<option <?php echo ($perkawinan == 'Cerai Mati')? "selected": "" ?>>Cerai Mati</option>
		</select>
	</p>
	<p>
		<label for="pekerjaan">Pekerjaan: </label>
		<input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan" value="<?php echo $identitas['pekerjaan']?>"/>
	</p>
	<p>
		<label for="kewarganegaraan">Kewarganegaraan: </label>
		<?php $kewarganegaraan = $identitas['kewarganegaraan']; ?>
		<select name="kewarganegaraan">
			<option <?php echo ($kewarganegaraan == 'WNI')? "selected": "" ?>>WNI</option>
			<option <?php echo ($kewarganegaraan == 'WNA')? "selected": "" ?>>WNA</option>
		</select>
	</p>
	<p>
		<label for="tgl_berlaku">Berlaku Hingga: </label>
		<input type="text" name="tgl_berlaku" placeholder="Masa Berlaku" value="<?php echo $identitas['tgl_berlaku']?>"/>
	</p>
	<p>
		<input type="submit" value="Simpan" name="simpan"/>
	</p>
	
	</fieldset>
	</form>
	
	<script>
		
	</script>
</body>
</html>
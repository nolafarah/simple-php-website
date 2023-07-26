<html>
<head>
	<title>Formulir Pengisian Identitas KTP</title>
</head>
<body bgcolor="#CBE6FA">
	<header>
		<h3>Formulir Pengisian Identitas KTP</h3>
	</header>
	
	<form action="proses-ktp.php" method="POST">
	
	<fieldset>
	
	<p>
		<label for="nik">NIK: </label>
		<input type="text" name="nik" placeholder="Masukkan NIK"/>
	</p>
	<p>
		<label for="nama">Nama: </label>
		<input type="text" name="nama" placeholder="Nama Lengkap"/>
	</p>
	<p>
		<label for="tempat_lahir">Tempat Lahir: </label>
		<input type="text" name="tempat_lahir" placeholder="Tempat Lahir"/>
	</p>
	<p>
		<label for="tgl_lahir">Tanggal Lahir: </label>
		<input type="date" name="tgl_lahir" id="tgl_lahir"/>
	</p>
	<p>
		<label for="jenis_kelamin">Jenis Kelamin: </label>
		<label><input type="radio" name="jenis_kelamin" value="laki-laki">Laki-laki</label>
		<label><input type="radio" name="jenis_kelamin" value="perempuan">Perempuan</label>
	</p>
	<p>
		<label for="goldar">Gol. Darah: </label>
		<select name="goldar">
			<option>A</option>
			<option>B</option>
			<option>AB</option>
			<option>O</option>
		</select>
	</p>
	<p>
		<label for="alamat">Alamat: </label>
		<textarea name="alamat"></textarea>
	</p>
	<p>
		<label for="provinsi">Provinsi: </label>
		<input type="text" name="provinsi" placeholder="Masukkan Provinsi"/>
	</p>
	<p>
		<label for="kota">Kota: </label>
		<input type="text" name="kota" placeholder="Masukkan Kota"/>
	</p>
	<p>
		<label for="rt">RT: </label>
		<input type="text" name="rt" placeholder="Masukkan RT"/>
	</p>
	<p>
		<label for="rw">RW: </label>
		<input type="text" name="rw" placeholder="Masukkan RW"/>
	</p>
	<p>
		<label for="kelurahan">Kel/Desa: </label>
		<input type="text" name="kelurahan" placeholder="Masukkan Kelurahan"/>
	</p>
	<p>
		<label for="kecamatan">Kecamatan: </label>
		<input type="text" name="kecamatan" placeholder="Masukkan Kecamatan"/>
	</p>
	<p>
		<label for="kode_pos">Kode Pos: </label>
		<input type="text" name="kode_pos" placeholder="Masukkan Kode Pos"/>
	</p>
	<p>
		<label for="agama">Agama: </label>
		<select name="agama">
			<option>Islam</option>
			<option>Kristen</option>
			<option>Katolik</option>
			<option>Hindu</option>
			<option>Budha</option>
			<option>Konghuchu</option>
			<option>Atheis</option>
		</select>
	</p>
	<p>
		<label for="status_perkawinan">Status Perkawinan: </label>
		<select name="status_perkawinan">
			<option>Belum Kawin</option>
			<option>Kawin</option>
			<option>Cerai Hidup</option>
			<option>Cerai Mati</option>
		</select>
	</p>
	<p>
		<label for="pekerjaan">Pekerjaan: </label>
		<input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan"/>
	</p>
	<p>
		<label for="kewarganegaraan">Kewarganegaraan: </label>
		<select name="kewarganegaraan">
			<option>WNI</option>
			<option>WNA</option>
		</select>
	</p>
	<p>
		<label for="tgl_berlaku">Berlaku Hingga: </label>
		<input type="text" name="tgl_berlaku" placeholder="Masa Berlaku"/>
	</p>
	<p>
		<input type="submit" value="Submit" name="submit"/>
	</p>
	
	</fieldset>
	</form>

</body>
</html>
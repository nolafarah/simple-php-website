<html>
<head>
	<link 
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
		rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
		crossorigin="anonymous"
	>
	<script 
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
		crossorigin="anonymous">
	</script>
	<style>
        .form-wrapper {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 50px;
			background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 10px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
	<title>Formulir Pendaftaran Siswa Baru</title>
</head>
<body style="background-color: #CBE6FA;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="form-wrapper">
					<h3 class="mb-4 m-3 text-center">Formulir Pendaftaran Siswa</h3>
	
					<form action="proses-pendaftaran.php" method="POST">
				
					<div class="form-group row mb-3 m-3">
						<label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama" id="nama" style="width:300px;"/>
						</div>
					</div>
					<div class="form-group row mb-3 m-3">
						<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="alamat" style="width:300px;"></textarea>
						</div>
					</div>
					<fieldset class="form-group row mb-3 m-3">
						<label class="col-form-label col-sm-4 pt-0">Jenis Kelamin</label>
						<div class="col-sm-8">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki">
								<label class="form-check-label" for="laki-laki">Laki-laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
								<label class="form-check-label" for="perempuan">Perempuan</label>
							</div>
						</div>
					</fieldset>
					<div class="form-group row mb-3 m-3">
						<label for="agama" class="col-sm-4 col-form-label">Agama</label>
						<div class="col-sm-8">
							<select class="form-select" name="agama" style="width:300px;">
								<option value="">Pilih Agama</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Katolik">Katolik</option>
								<option value="Hindu">Hindu</option>
								<option value="Budha">Budha</option>
								<option value="Konghuchu">Konghuchu</option>
							</select>
						</div>
					</div>
					<div class="form-group row mb-3 m-3">
						<label for="sekolah_asal" class="col-sm-4 col-form-label">Sekolah Asal</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="sekolah_asal" style="width:300px;"/>
						</div>
					</div>
					<div class="form-group row mb-3 m-3">
						<div class="col-sm-12 text-center">
							<input type="submit" class="btn btn-primary" value="Daftar" name="daftar"/>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
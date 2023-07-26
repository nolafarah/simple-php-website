<?php
include("config.php");
?>

<!DOCTYPE HTML>
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
		.icon-wrapper {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .icon-wrapper img {
            width: 24px;
            height: 24px;
            margin-right: 5px;
        }

        .center-text {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
	</style>
	<title>Daftar Identitas KTP</title>
</head>
<body>
	<div class="icon-wrapper">
        <a href="index.php" class="btn p-0">
            <img src="img/icons/angle-left.png" alt="Angle Left Icon" style="width:24px, height:24px">
        </a>
    </div>

    <div class="text-center">
        <h3 class="mb-0 mt-3">Daftar Identitas KTP</h3>
    </div>

	<nav class="m-3">
		<a href="ktp.php" class="btn btn-primary">Tambah Baru</a>
	</nav>
	
	<br>
	
	<div class="table-responsive">
	<table class="table table-hover mx-auto" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Gol. Darah</th>
				<th>Alamat</th>
				<th>Provinsi</th>
				<th>Kota</th>
				<th>RT</th>
				<th>RW</th>
				<th>Kel/Desa</th>
				<th>Kec</th>
				<th>Kode Pos</th>
				<th>Agama</th>
				<th>Status Perkawinan</th>
				<th>Pekerjaan</th>
				<th>Kewarganegaraan</th>
				<th>Berlaku Hingga</th>
				<th>Tindakan</th>
			</tr>
		</thead>
	</tbody>
	</div>
	
<?php
$sql = "SELECT * FROM identitas_ktp";
$query = mysqli_query($db, $sql);

while($identitas = mysqli_fetch_array($query)){
	echo "<tr>";
	echo "<td>".$identitas['id']."</td>";
	echo "<td>".$identitas['nik']."</td>";
	echo "<td>".$identitas['nama']."</td>";
	echo "<td>".$identitas['tempat_lahir']."</td>";
	echo "<td>".$identitas['tgl_lahir']."</td>";
	echo "<td>".$identitas['jenis_kelamin']."</td>";
	echo "<td>".$identitas['goldar']."</td>";
	echo "<td>".$identitas['alamat']."</td>";
	echo "<td>".$identitas['provinsi']."</td>";
	echo "<td>".$identitas['kota']."</td>";
	echo "<td>".$identitas['rt']."</td>";
	echo "<td>".$identitas['rw']."</td>";
	echo "<td>".$identitas['kelurahan']."</td>";
	echo "<td>".$identitas['kecamatan']."</td>";
	echo "<td>".$identitas['kode_pos']."</td>";
	echo "<td>".$identitas['agama']."</td>";
	echo "<td>".$identitas['status_perkawinan']."</td>";
	echo "<td>".$identitas['pekerjaan']."</td>";
	echo "<td>".$identitas['kewarganegaraan']."</td>";
	echo "<td>".$identitas['tgl_berlaku']."</td>";
	
	echo "<td>";
	echo "<div class='d-grid gap-2 d-md-flex'>";
	echo "<a href='edit-ktp.php?id=".$identitas['id']."' class='btn btn-primary'>Edit</a>";
	echo "<a href='hapus-ktp.php?id=".$identitas['id']."' class='btn btn-danger'>Hapus</a>";
	echo "</div>";
	echo "</td>";
	echo "</tr>";
}
?>

</tbody>
</table>

<p class="m-3">Total: 
<?php
	echo mysqli_num_rows($query) 
?>
</p>

</body>
</html>
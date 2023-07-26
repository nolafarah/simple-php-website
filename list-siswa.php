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
	<title>Pendaftaran Siswa Baru</title>
</head>
<body>
	<div class="icon-wrapper">
        <a href="index.php" class="btn p-0">
            <img src="img/icons/angle-left.png" alt="Angle Left Icon" style="width:24px, height:24px">
        </a>
    </div>

    <div class="text-center">
        <h3 class="mb-0 mt-3">Daftar Siswa</h3>
    </div>

	<nav class="m-3">
		<a href="form-daftar.php" class="btn btn-primary">Tambah Baru</a>
	</nav>

	<br>
	
	<table class="table table-hover mx-auto" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Sekolah Asal</th>
				<th>Tindakan</th>
			</tr>
		</thead>
	</tbody>
	
<?php
$sql = "SELECT * FROM calon_siswa";
$query = mysqli_query($db, $sql);

while($siswa = mysqli_fetch_array($query)){
	echo "<tr>";
	echo "<td>".$siswa['id']."</td>";
	echo "<td>".$siswa['nama']."</td>";
	echo "<td>".$siswa['alamat']."</td>";
	echo "<td>".$siswa['jenis_kelamin']."</td>";
	echo "<td>".$siswa['agama']."</td>";
	echo "<td>".$siswa['sekolah_asal']."</td>";
	
	echo "<td>";
	echo "<div class='d-grid gap-2 d-md-flex'>";
	echo "<a href='form-edit.php?id=".$siswa['id']."' class='btn btn-primary'>Edit</a>";
	echo "<a href='hapus.php?id=".$siswa['id']."' class='btn btn-danger'>Hapus</a>";
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
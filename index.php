<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" HREF="img/logo_lpk.png">
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
		.body{
			margin:0 auto;
		}
		.navbar-brand{
			color: #FFFFFF;
		}
		.card:hover{
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    		transform: scale(1.05);
		}
		.carousel {
			display: flex;
			justify-content: space-between;
			overflow: hidden;
			padding:30px;
		}
		.carousel img {
			border-radius: 20px;
			width: 520px;
			height: 510px;
			object-fit: cover;
			transition: transform 0.3s ease;
		}
		.menu-section{
			margin: 0 auto;
			padding:30px;
		}
	</style>
	<title>My Page</title>
</head>

<body class="body bg-light" id="page-top"><center><table>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
		<div class="container-md">
			<button 
				class="navbar-toggler" 
				type="button" 
				data-bs-toggle="collapse" 
				data-bs-target="#navbarTogglerDemo03" 
				aria-controls="navbarTogglerDemo03" 
				aria-expanded="false" 
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#page-top"><b>My Page</b></a>
			<div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
				<a href="login/index.php" class="btn btn-outline-light"><b>Login</b></a>
			</div>
		</div>
	</nav>
	<header class="mb-3">
		<tr>
			<td rowspan="5" align='center'><img src="img/logo_depok.png" width="100" height="100"></td>
			<td align='center'><b>PELATIHAN PROGRAMMER</b></td>
			<td rowspan="5" align='center'><img src="img/logo_lpk.png" width="100" height="100"></td>
		</tr>
		<tr><td align='center'><b>DINAS TENAGA KERJA KOTA DEPOK</b></td></tr>
		<tr><td align='center'><b>TAHUN 2023</b></td></tr>
		<tr><td align='center'><b>Kerja Sama dengan LPK Mutiara Komputer Coding dan LP3I Depok</b></td></tr>
	</header>
	</table></center>

	<!-- Carousel -->
	<div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/img3.jpg" class="d-block w-100" alt="Slide 1">
			</div>
			<div class="carousel-item">
				<img src="img/img1.jpg" class="d-block w-100" alt="Slide 2">
			</div>
			<div class="carousel-item">
				<img src="img/img2.jpg" class="d-block w-100" alt="Slide 3">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	
	<!-- Menu -->
	<section class="menu-section" id="menu" style="background-color: #CBE6FA;">
	<h4 class="m-3" style="padding:10px">Menu</h4>
	<div class="row w-100 mx-auto row-cols-1 row-cols-md-2 g-4">
		<div class="col-sm-6 mb-3 mb-sm-0">
			<div class="card m-3">
				<div class="card-body">
					<h5 class="card-title">Pendaftaran Siswa Baru</h5>
					<p class="card-text">Daftarkan dirimu dan ikuti pelatihan dari Disnaker.</p>
					<a href="form-daftar.php" class="btn btn-primary">Go</a>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card m-3">
				<div class="card-body">
					<h5 class="card-title">Pendaftar</h5>
					<p class="card-text">Lihat daftar siswa yang telah mendaftar.</p>
					<a href="list-siswa.php" class="btn btn-primary">Go</a>
				</div>
			</div>
		</div>

		<!-- Popup setelah melakukan daftar siswa baru -->
		<?php
		if(isset($_GET['status'])): ?>
		<p class="m-3">
			<?php
			if($_GET['status'] == 'success'){
				echo "Pendaftaran Siswa Baru Berhasil!";
			}
			else{
				echo "Pendaftaran Gagal!";
			}
			?>
		</p>
		<?php endif;?>

		<div class="col-sm-6 mb-3 mb-sm-0">
			<div class="card m-3">
				<div class="card-body">
					<h5 class="card-title">Form Data KTP</h5>
					<p class="card-text">Isi identitas diri sesuai KTP.</p>
					<a href="form-ktp.php" class="btn btn-primary">Go</a>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card m-3">
				<div class="card-body">
					<h5 class="card-title">Daftar Identitas KTP</h5>
					<p class="card-text">Lihat data KTP yang sudah terisi.</p>
					<a href="list-identitas.php" class="btn btn-primary">Go</a>
				</div>
			</div>
		</div>

		<!-- Popup setelah melakukan daftar KTP -->
		<?php
		if(isset($_GET['data'])): ?>
		<p class="m-3">
			<?php
			if($_GET['data'] == 'success'){
				echo "Pengisian Data KTP Berhasil!";
			}
			else{
				echo "Pengisian Data KTP Gagal!";
			}
			?>
		</p>
		<?php endif;?>

		<div class="col-sm-6 mb-3 mb-sm-0">
			<div class="card m-3">
				<div class="card-body">
					<h5 class="card-title">Cari Data Siswa</h5>
					<p class="card-text">Cari data siswa yang telah mendaftar.</p>
					<a href="search.php" class="btn btn-primary">Go</a>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card m-3">
				<div class="card-body">
					<h5 class="card-title">Produk Toko Online</h5>
					<p class="card-text">Lihat selengkapnya daftar produk.</p>
					<a href="../simple-php-website/ecommerce/index.php" class="btn btn-primary">Go</a>
				</div>
			</div>
		</div>
	</div>
	</section>

<h4 class="m-3" style="padding:40px">Preview Produk</h4>
<table class="product-table mx-auto m-3">
	<tr>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=76"><img src="ecommerce/produk/76.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=19"><img src="ecommerce/produk/19.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=29"><img src="ecommerce/produk/29.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=74"><img src="ecommerce/produk/74.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=60"><img src="ecommerce/produk/60.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=30"><img src="ecommerce/produk/30.jpg" width="200" height="200"></td>
	</tr>
	<tr>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=46"><img src="ecommerce/produk/46.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=68"><img src="ecommerce/produk/68.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=58"><img src="ecommerce/produk/58.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=44"><img src="ecommerce/produk/44.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=13"><img src="ecommerce/produk/13.jpg" width="200" height="200"></td>
		<td style="padding:10px"><a href="../simple-php-website/ecommerce/detail.php?mode=tampil&id=28"><img src="ecommerce/produk/28.jpg" width="200" height="200"></td>
	</tr>
</table>

<!-- Footer -->
<footer class="footer mt-5 bg-primary text-white">
	<div class="container text-center">
		<span>Copyright © 2023 All Rights Reserved.</span>
	</div>
</footer>

</body>
</html>
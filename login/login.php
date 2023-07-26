<?php
	ob_start();
	session_start();
	$username = $_POST['username'];
	$kata_sandi = $_POST['kata_sandi'];
	$_SESSION['username'] = $username;
	$Open = mysqli_connect("localhost","root","", "pendaftaran_siswa");
	
	if(!$Open){
		die("Koneksi ke Engine MySQL Gagal!");
	}
	$Koneksi = mysqli_select_db($Open, "pendaftaran_siswa");
	if(!$Koneksi){
		die("Koneksi ke Database Gagal!");
	}
	
	$sql = "SELECT * FROM admin where username='$username'";
	$qry = mysqli_query($Open, $sql);
	$num = mysqli_num_rows($qry);
	$row = mysqli_fetch_array($qry);
	
	if($num==0 OR $kata_sandi!=$row['kata_sandi']){

?>
	<script language="JavaScript">
		alert('Username atau Password tidak sesuai!');
		document.location = 'index.php';
	</script>
	
<?php
	}
	else{
		$_SESSION['login']=1;
		header("Location: ../index.php");
	}
	mysqli_close($Open); //tutup koneksi engine MySQL
	
?>
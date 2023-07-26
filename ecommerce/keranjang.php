<?php
	session_start(); // Start the session
?>

<!DOCTYPE html>
<html>
<head>
	<script>
		function delete_confirm(e){
			if(confirm('Delete selected item?')){return true;}
			else{e.stopPropagation();e.preventDefault();}
		}
	</script>
	
	<style>
		.div{width:1000px;margin:auto;padding:20px;border:solid 1px #aaaaaa;font:16px arial}
		.table{width:100%;border-collapse:collapse}
		.table th{padding:5px;border:solid 1px #aaaaaa;background:#dddddd}
		.table td{padding:5px;border:solid 1px #aaaaaa}
		.table td:nth-child(5){text-align:right;white-space:nowrap;}
		.table td:nth-child(6){text-align:right;white-space:nowrap;}
		.table td:nth-child(7){text-align:right;white-space:nowrap;}
		.table input[type=text]{font:16px arial;border:1px solid #dddddd;width:50%}
		.table select{font:16px arial;border:none;width:100%}
		.cancel{font:16px arial;float:left;width:100px;}
		.save{font:16px arial;float:right;width:100px;}
	</style>
</head>
<body>
<?php
//---------------------------------------------------------------------------------------------
if(function_exists("date_default_timezone_set"))date_default_timezone_set("Asia/Jakarta");

$con=mysqli_connect("localhost","root","","produk");

if(!isset($_GET["mode"]))$_GET["mode"]="";
if(!isset($_GET["id"]))$_GET["id"]="";

if($_GET["mode"]="keranjang_browse"){
	$q=mysqli_query($con,
		"SELECT 
			keranjang.id_keranjang,
			user.full_name,
			user.status,
			produk.nama,
			produk.file,
			produk.harga,
			keranjang.jumlah,
			produk.harga*keranjang.jumlah AS sub_total, 
			keranjang.tanggal_pesan,
			keranjang.catatan, 
			keranjang.checked 
		FROM keranjang 
		JOIN user ON user.id=keranjang.id_user 
		JOIN produk ON produk.id=keranjang.id_produk 
		WHERE user.id='$_GET[id]' 
		ORDER BY keranjang.tanggal_pesan
	");
	
	if(mysqli_num_rows($q)>0){
		$row="";
		$total=0;
		while($h=mysqli_fetch_array($q)){
			$row=$row.
				"<tr ".($h["checked"]==""?"style='color:#aaaaaa'":"").">
					<td>
						<a href='temp.php?mode=keranjang_checked&id_keranjang=$h[id_keranjang]'>
							<input type='checkbox' $h[checked]>
						</a>
					</td>
					<td style='border-right:none'><img src='produk/$h[file]' width=100></td>
					<td style='border-left:none'>
						Tanggal pesan: $h[tanggal_pesan]<br><br>
						$h[nama]
						<br><br>
						Harga: Rp ".number_format($h["harga"],0,".",".")."
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Jumlah beli: 
						<a href='temp.php?mode=keranjang_minus&id_keranjang=$h[id_keranjang]'><button>-</button></a>
						&nbsp;$h[jumlah]&nbsp;
						<a href='temp.php?mode=keranjang_plus&id_keranjang=$h[id_keranjang]'><button>+</button></a>
						<span style='float:right'>Total Rp ".number_format($h["sub_total"],0,".",".")."</span>
					</td>
			</tr>";
			$total=$total+($h["checked"]==""?0:$h["sub_total"]);
		}

		echo
			"<div class='div'>
				<h1 style='margin:10px;text-align:center;'>Keranjang anda</h1>
				<table class='table'>
					<tr>
						<th style='text-align:right' colspan=3>
							Total yang harus dibayar Rp ".number_format($total,0,".",".")."
							<button>Bayar</button>
						</th>
					</tr>
					$row
				</table>
				<br>
				<a href='index.php' style='float:left'><button>Close</button></a>
				<br>
			</div>";
	}
	else{
		echo
			"<div class='div'>
				<h1 style='margin:10px;text-align:center;'>Keranjang anda masih kosong</h1>
				<a href='index.php' style='float:left'><button>Close</button></a>
				<br>
			</div>";
	}
}
//-----------------------------------------------------------------------------------------------
?>
</body>
</html>
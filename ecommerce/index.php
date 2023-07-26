<?php
	session_start(); // Start the session
	if(!isset($_SESSION["id"]))$_SESSION["id"]="";
	if(!isset($_SESSION["user"]))$_SESSION["user"]="";
	if(!isset($_SESSION["status"]))$_SESSION["status"]="";
	if(!isset($_SESSION["parameter"]))$_SESSION["parameter"]="";
?>

<html>
<head>
	<title>PRODUK</title>
	<script>
		function delete_confirm(e){
			if(confirm('Delete selected item?')){return true;}
			else{e.stopPropagation();e.preventDefault();}
		}

		function sign_out_confirm(e){
			if(confirm('Are you sure to sign out?')){return true;}
			else{e.stopPropagation();e.preventDefault();}
		}

		function f_validchar($event,$validcharacter){
			$event=($event)?$event:window.event;
			//|backspace|enter|left|down|up|right|delete|
			if(("|8|13|37|38|39|40|46|").indexOf($event.which)>0)return true; 
			return($validcharacter.indexOf(String.fromCharCode($event.which))<0?false:true)
		}
	</script>
</head>
<body>
<?php
//---------------------------------------------------------------------------------------------
function f_parameter($key,$value){
	$_SESSION["parameter"]=array(
		"mode"=>"$_GET[mode]",
		"start"=>"$_GET[start]",
		"urut"=>"$_GET[urut]",
		"kategori"=>"$_GET[kategori]",
		"cari"=>"$_GET[cari]",
		"min"=>"$_GET[min]",
		"max"=>"$_GET[max]"
	);
		
	if($key!="")$_SESSION["parameter"][$key]=$value;
	
	$parameter="";
	foreach($_SESSION["parameter"] as $key=>$key_value) {
		$parameter=$parameter.($parameter==""?"":"&").$key."=".$key_value;
	}
	return $parameter;
}
//---------------------------------------------------------------------------------------------
	if(function_exists("date_default_timezone_set"))date_default_timezone_set("Asia/Jakarta");
	
	if(!isset($_GET["mode"]))$_GET["mode"]="";
	if(!isset($_GET["start"]))$_GET["start"]=1;
	if(!isset($_GET["urut"]))$_GET["urut"]="nama";
	if(!isset($_GET["kategori"]))$_GET["kategori"]="";
	if(!isset($_GET["cari"]))$_GET["cari"]="";
	if(!isset($_GET["min"]))$_GET["min"]="";
	if(!isset($_GET["max"]))$_GET["max"]="";
	
	$con=mysqli_connect("localhost","root","","produk");
	
	if($_SESSION["user"]==""){
		$header=
			"<span style='float:right'>&nbsp;
				<a href='user.php?".f_parameter("mode","input")."'><button>Sign In</button></a>
			</span>
			<span style='float:right'>
				<a href='user.php?".f_parameter("mode","daftar")."'><button title='Belum punya akun? Silakan daftar'>Daftar</button></a>
			</span>";
	}
	elseif($_SESSION["status"]=="customer"){
		$header=
			"<span style='float:right'>&nbsp;
				<a href='user.php?".f_parameter("mode","sign_out")."' onclick=sign_out_confirm(event)>
					<button>$_SESSION[user] - Sign Out</button>
				</a>
			</span>
			<span style='float:right'>
				<a href='keranjang.php?mode=keranjang_browse&id=$_SESSION[id]'>
					<button>Keranjang</button>
				</a>
			</span>";
	}
	elseif($_SESSION["status"]=="employee"){
		$header=
			"<span style='float:left'><a href='input.php?".f_parameter("mode","insert")."'><button>Input Data</button></a></span>
			<span style='float:right'>
				<a href='user.php?".f_parameter("mode","sign_out")."' onclick=sign_out_confirm(event)>
					<button>$_SESSION[user] - Sign Out</button>
				</a>
			</span>";
	}
	elseif($_SESSION["status"]=="administrator"){
		$header=
			"<span style='float:left'><a href='input.php?".f_parameter("mode","insert")."'><button>Input Data</button></a></span>
			<span style='float:right'>&nbsp;
				<a href='user.php?".f_parameter("mode","sign_out")."' onclick=sign_out_confirm(event)>
					<button>$_SESSION[user] - Sign Out</button>
				</a>
			</span>
			<span style='float:right'>
				<a href='user.php?".f_parameter("mode","user_manager")."'><button>User Manager</button></a>
			</span>";
	}
	else{
		session_destroy();
		header('Location: index.php');
	}
	
		if($_GET["min"]=="" AND $_GET["max"]=="")$harga="";
	elseif($_GET["min"]!="" AND $_GET["max"]=="")$harga="harga>=$_GET[min] AND ";
	elseif($_GET["min"]=="" AND $_GET["max"]!="")$harga="harga<=$_GET[max] AND ";
	elseif($_GET["min"]==$_GET["max"])$harga="harga=$_GET[min] AND ";
	elseif($_GET["min"]<$_GET["max"])$harga="(harga BETWEEN $_GET[min] AND $_GET[max]) AND ";
	elseif($_GET["min"]>$_GET["max"])$harga="(harga BETWEEN $_GET[max] AND $_GET[min]) AND ";
	
	$q=mysqli_query($con,
		"SELECT COUNT(id) AS total FROM produk 
		WHERE $harga kategori LIKE '%$_GET[kategori]%' AND 
		(nama LIKE '%$_GET[cari]%' OR kategori LIKE '%$_GET[cari]%') 
		ORDER BY $_GET[urut]");
	while($h=mysqli_fetch_array($q)){$record=$h["total"];}
	
	$col=4;
	$row=5;
	$limit=floor($col*$row);
	$start=($_GET["start"]-1)*$limit;
	$page=ceil($record/$limit);
	$pagination="";
	for($i=1;$i<=$page;$i++){
		$pagination=$pagination.
			($i==$_GET["start"]?"<b>$i</b>":"<a href='index.php?".f_parameter("start",$i)."'>$i</a>").
			"&nbsp;&nbsp;&nbsp;";
	}

	$tr=$td="";
	$cols=0;
	$update="";
	$q=mysqli_query($con,
		"SELECT * FROM produk 
		WHERE $harga kategori LIKE '%$_GET[kategori]%' AND
		(nama LIKE '%$_GET[cari]%' OR kategori LIKE '%$_GET[cari]%') 
		ORDER BY $_GET[urut] LIMIT $start,$limit");
	$row=mysqli_num_rows($q);

	while($h=mysqli_fetch_array($q)){
		if($h["file"]=="")$h["file"]="_empty.jpg";
		
		if($_SESSION["status"]=="employee"||$_SESSION["status"]=="administrator"){
			$update=
				"<a href='input.php?mode=update&id=$h[id]'>edit</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href='input.php?mode=delete&id=$h[id]&file=$h[file]' onclick=delete_confirm(event)>delete</a>";
		}
		
		$cols++;
		$td=$td.
			"<td style='padding:5px;text-align:center;vertical-align:top;background:#eeeeee'>
				<div>$update</div>
				<a href='detail.php?mode=tampil&id=$h[id]' style='text-decoration:none'> 
					<img src='produk/$h[file]?z=".date("YmdHis")."' width=150>
					<div style='width:80%;text-align:left;margin:auto;color:black'>
						<b>Kategori: $h[kategori]</b><br>$h[nama]<h3 style='margin:0'>Rp".number_format($h["harga"],0,".",".")."</h3>
					</div>
				</a>
			</td>";
		if($cols==$col){
			$tr=$tr."<tr>$td</tr>";
			$td="";
			$cols=0;
		}
	}
	$tr=$tr."<tr>$td</tr>";
	$header="<span>$pagination</span>".$header;

	$urut="<b>Urut berdasarkan:</b><br>";
	$label=explode(",","nama,Nama,harga,Harga terendah,harga DESC,Harga tertinggi");
	for($i=0;$i<count($label);$i+=2){
		$urut=$urut.
			"<a href='index.php?".f_parameter("urut","$label[$i]")."'>
				<input type='radio' onclick=this.parentElement.click() 
					name='urut'".($_GET["urut"]==$label[$i]?" checked":"").">".$label[$i+1].
			"</a><br>";
	}

	$kategori="<b>Kategori:</b><br>";
	$label=explode(",",",Semua kategori,makanan,Makanan,minuman,Minuman");
	for($i=0;$i<count($label);$i+=2){
		$kategori=$kategori.
			"<a href='index.php?".f_parameter("kategori","$label[$i]")."'>
				<input type='radio' onclick=this.parentElement.click() 
					name='kategori'".($_GET["kategori"]==$label[$i]?" checked":"").">".$label[$i+1].
			"</a><br>";
	}
	
	$cari=
		"<form action='index.php' method='get'>
			<b>Harga:</b>
			<div style='border:solid 1px #cccccc;overflow:hidden;margin-bottom:3px'>
				&nbsp;Rp <input type=text style='width:100%;border:none' name='min' value='$_GET[min]' placeholder='harga minimum' onblur=this.parentElement.parentElement.submit() onkeypress=return(f_validchar(event,'0123456789'))>
			</div>
			<div style='border:solid 1px #cccccc;overflow:hidden'>
				&nbsp;Rp <input type=text style='width:100%;border:none' name='max' value='$_GET[max]' placeholder='harga maksimum' onblur=this.parentElement.parentElement.submit() onkeypress=return(f_validchar(event,'0123456789'))>
			</div><br>
			<b>Pencarian:</b><br>
			<input type=hidden name='urut' value='$_GET[urut]'>
			<input type=hidden name='kategori' value='$_GET[kategori]'>
			<input type=text style='border:solid 1px #cccccc;width:100%' name='cari' value='$_GET[cari]' onblur=this.parentElement.submit()>
		</form>
		<br>";

	echo 
		"<div style='width:80%;margin:auto'>
			<table style='width:100%;font:13px arial'>
				<tr>
					<td style='padding:10px;background:#03cffc;text-align:center' colspan=2>$header</td>
				</tr>
				<tr>
					<td style='width:150px;vertical-align:top;white-space:nowrap;padding:5px'>
						$urut<br>$kategori<br>$cari
					</td>
					<td><table style='width:100%;font:13px arial'>$tr</table></td>
			</table>
		</div>";
?>
</body>
</html>
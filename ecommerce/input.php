<!DOCTYPE html>
<html>
<head>
	<style>
		.div{width:80%;margin:auto;padding:0px 20px 20px 20px;font:16px arial;text-align:center}
		.table{width:100%;}
		.table td{padding:4px;border:solid 1px #cccccc;white-space:nowrap}
		.table td:nth-child(1){border:none;vertical-align:top;text-align:right;}
		.table td:nth-child(2){width:100%;text-align:center;overflow:hidden}
		.table input[type=text]{font:16px arial;border:none;width:100%}
		.table input[type=file]{display:none;}
		.table input[type=button]{font:16px arial;border:none;text-decoration:underline;background:white;cursor:pointer}
		.table textarea{font:16px arial;border:none;width:100%;min-height:80px;resize:vertical;}
		.cancel{font:16px arial;float:left;width:100px;}
		.save{font:16px arial;float:right;width:100px;}}
	</style>
	<script src="ckeditor/ckeditor.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded",function(){
			editor=CKEDITOR.replace("editor",{height:150,language:"en",skin:"moonocolor"},"");
		});
		
		function f_search(event){
			if(event.target.files.length>0){
				if(document.getElementById("img_temp"))document.getElementById("img_temp").remove();
				var img=document.createElement("img");
				img.setAttribute("id","img_temp")
				document.getElementById("img_container").appendChild(img);
				document.getElementById("img").style.display="none";
				img.src=URL.createObjectURL(event.target.files[0]);
				img.onload=function(){if(img.width>img.height)img.width=200;else img.height=200;};
			}
		}
		
		function f_validchar($event,$validcharacter){
			$event=($event)?$event:window.event;
			//|backspace|enter|left|down|up|right|delete|
			if(("|8|13|37|38|39|40|46|").indexOf($event.which)>0)return true; 
			return($validcharacter.indexOf(String.fromCharCode($event.which))<0?false:true)
		}

		function f_save(){
			document.getElementById('deskripsi').value=editor.getData();
			document.getElementById('save').submit();
		}
	</script>
</head>
<body>
<?php

if(function_exists("date_default_timezone_set"))date_default_timezone_set("Asia/Jakarta");

$con=mysqli_connect("localhost","root","","produk");

if(!isset($_GET["mode"]))$_GET["mode"]="";
if(!isset($_POST["mode"]))$_POST["mode"]="";

//-----------------------------------------------------------------------------------------------
if($_GET["mode"]=="insert"){
	echo
		"<div class='div'>
			<h1 style='margin:10px'>Form Input Data</h1>
			<form id='save' action='input.php' method='post' enctype='multipart/form-data'>
				<input type='hidden' name='mode' value='save_insert'>
				<input type='hidden' id='deskripsi' name='deskripsi'></textarea>
				<table class='table'>
					<tr><td>Nama:</td><td><input type='text' name='nama'></td></tr>
					<tr><td>Harga:</td><td>Rp <input type='text' name='harga' onkeypress=return(f_validchar(event,'0123456789'))></td></tr>
					<tr><td>Deskripsi:</td><td><textarea id='editor'></textarea></td></tr>
					<tr>
						<td>Foto:</td>
							<td>
								<input type='file' name='search' id='search' accept='image/*' onchange=f_search(event)>
								<img id='img' src='produk/_empty.jpg?z=".date("YmdHis")."' width=200>
								<div id='img_container'></div>
								<input type='button' value='Search' onclick=document.getElementById('search').click()>
							</td>
					</tr>
				</table>
			</form>
			<br>
			<a href='index.php'><button class='cancel'>Cancel</button></a>
			<button class='save' onclick=f_save()>Save</button>
			<br>
		</div>";
}
//-----------------------------------------------------------------------------------------------
if($_GET["mode"]=="update"){
	$q=mysqli_query($con,"SELECT * FROM produk WHERE id='$_GET[id]'");
	while($h=mysqli_fetch_array($q)){
		echo
			"<div class='div'>
				<h1>Form Edit Data</h1>
				<form id='save' action='input.php' method='post' enctype='multipart/form-data'>
					<input type='hidden' name='mode' value='save_update'>
					<input type='hidden' name='file' value='$h[file]'>
					<input type='hidden' name='id' value='$h[id]'>
					<input type='hidden' id='deskripsi' name='deskripsi'></textarea>
					<table class='table'>
						<tr><td>Nama:</td><td><input type='text' name='nama' value='$h[nama]'></td></tr>
						<tr><td>Harga:</td><td>Rp <input type='text' name='harga' value='$h[harga]' onkeypress=return(f_validchar(event,'0123456789'))></td></tr>
						<tr><td>Deskripsi:</td><td><textarea id='editor'>$h[deskripsi]</textarea></td></tr>
						<tr>
							<td>Foto:</td>
							<td>
								<input type='file' name='search' id='search' accept='image/*' onchange=f_search(event)>
								<img id='img' src='produk/$h[file]?z=".date("YmdHis")."' width=200>
								<div id='img_container'></div>
								<input type='button' value='Search' onclick=document.getElementById('search').click()>
							</td>
						</tr>
					</table>
				</form>
				<br>
				<a href='index.php'><button class='cancel'>Cancel</button></a>
				<button class='save' onclick= onclick=f_save()>Save</button>
				<br>
			</div>";
	}
}
//-----------------------------------------------------------------------------------------------
elseif($_POST["mode"]=="save_insert"){
	$filename="_empty.jpg";
	if(isset($_FILES["search"])&&!empty($_FILES["search"])){
		$folder="produk/";
		$filename=date("YmdHis").".jpg";
		$file=$folder.$_FILES["search"]["name"];
		move_uploaded_file($_FILES["search"]["tmp_name"],$file);
		rename($file,$folder.$filename);
	}

	mysqli_query($con,
		"INSERT INTO produk (nama,harga,deskripsi,file) 
		VALUES 
		('$_POST[nama]','$_POST[harga]','$_POST[deskripsi]','$filename')"
	);
	mysqli_close($con);
	header('Location:index.php');
}
//-----------------------------------------------------------------------------------------------
elseif($_POST["mode"]=="save_update"){
	$filename=$_POST["file"];
	if($_FILES["search"]["name"]!=""){
		$folder="produk/";
		if($filename=="_empty.jpg")$filename=date("YmdHis").".jpg";
		$file=$folder.$_FILES["search"]["name"];
		move_uploaded_file($_FILES["search"]["tmp_name"],$file);
		rename($file,$folder.$filename);
	echo $file;
	}

	mysqli_query($con,
		"UPDATE produk 
		SET nama='$_POST[nama]',harga='$_POST[harga]',deskripsi='$_POST[deskripsi]',file='$filename' 
		WHERE id='$_POST[id]'"
	);
	mysqli_close($con);
	header('Location:index.php');
}
//-----------------------------------------------------------------------------------------------
elseif($_GET["mode"]=="delete"){
	mysqli_query($con,"DELETE FROM produk WHERE id=$_GET[id]");
	if($_GET["file"]!="_empty.jpg")unlink("produk/$_GET[file]");
	mysqli_close($con);
	header('Location:index.php');
}
//-----------------------------------------------------------------------------------------------
?>
</body>
</html>
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
		.div{width:700px;margin:auto;padding:20px;border:solid 1px #aaaaaa;font:16px arial;text-align:center}
		.table{width:100%;}
		.table td{padding:5px;border:solid 1px #aaaaaa;white-space:nowrap}
		.table td:nth-child(1){border:none;vertical-align:top;text-align:right;}
		.table td:nth-child(2){width:100%;text-align:center}
		.table input[type=text]{font:16px arial;border:none;width:100%}
		.table input[type=password]{font:16px arial;border:none;width:100%}
		.table select{font:16px arial;border:none;width:100%}
		.cancel{font:16px arial;float:left;width:100px;}
		.save{font:16px arial;float:right;width:100px;}
		.user{width:100%;border-collapse:collapse}
		.user th{padding:5px;border:solid 1px #cccccc;white-space:nowrap;background:#dddddd}
		.user td{padding:3px;border:solid 1px #cccccc;white-space:nowrap;text-align:left}
		.user th:nth-child(3){width:0px;text-align:right}
	</style>
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

$con=mysqli_connect("localhost","root","","produk");

if(!isset($_GET["mode"]))$_GET["mode"]="";
if(!isset($_POST["mode"]))$_POST["mode"]="";
//-----------------------------------------------------------------------------------------------
if($_GET["mode"]=="input"){
	echo
		"<div class='div'>
			<h1>Sign In</h1>
			<form id='sign_in' action='user.php' method='post'>
				<input type='hidden' name='mode' value='sign_in'>
				<table class='table'>
					<tr><td>User Name:</td><td><input type='text' name='user_name'></td></tr>
					<tr><td>Password:</td><td><input type='password' name='password'></td></tr>
				</table>
			</form>
			<br><br>
			<a href='index.php?".f_parameter("","")."'><button class='cancel'>Cancel</button></a>
			<button class='save' onclick=document.getElementById('sign_in').submit()>Sign In</button>
			<br>
		</div>";
}
//-----------------------------------------------------------------------------------------------
elseif($_POST["mode"]=="sign_in"){
	$q=mysqli_query($con,"SELECT * FROM user 
		WHERE user_name='".md5($_POST["user_name"])."' AND password='".md5($_POST["password"])."'");

	if(mysqli_num_rows($q)==0){
		mysqli_close($con);
		echo 
			"<script>
				alert('User Name dan/atau Password tidak cocok!!!');
				window.setTimeout(function(){window.location.href='index.php';},500);
			</script>";
	}
	else{
		while($h=mysqli_fetch_array($q)){
			$_SESSION["id"]=$h["id"];
			$_SESSION["user"]=$h["full_name"];
			$_SESSION["status"]=$h["status"];
			header("Location:index.php");
		}
		mysqli_close($con);
	}
}
//-----------------------------------------------------------------------------------------------
elseif($_GET["mode"]=="sign_out"){
	session_unset(); 
	session_destroy();
	header("Location:index.php");
}
//-----------------------------------------------------------------------------------------------
elseif($_GET["mode"]=="user_manager"){
	$q=mysqli_query($con,"SELECT * FROM user ORDER BY full_name");
	
	$row="";
	while($h=mysqli_fetch_array($q)){
		$row=$row.
			"<tr>
				<td>$h[full_name]</td>
				<td>$h[status]</td>
				<td>
					<a href='user.php?mode=user_edit&id=$h[id]'><button>Edit</button></a>
					<a href='user.php?mode=user_delete&id=$h[id]' onclick=delete_confirm(event)><button>Delete</button></a>
				</td>
			</tr>";
	}

	echo
		"<div class='div'>
			<h1 style='margin:10px'>User Manager</h1>
			<table class='user'>
				<tr>
					<th>Nama Lengkap</th>
					<th>Status</th>
					<th><a href='user.php?mode=user_new'><button>New</button></a></th>
				</tr>
				$row
			</table>
			<br>
			<a href='index.php' style='float:left'><button>Close</button></a>
			<br>
		</div>";
}
//-----------------------------------------------------------------------------------------------
elseif($_GET["mode"]=="user_edit"){
	$q=mysqli_query($con,"SELECT * FROM user WHERE id='$_GET[id]'");
	while($h=mysqli_fetch_array($q)){
		echo
			"<div class='div'>
				<h1>Edit User</h1>
				<form id='user_save_edit' action='user.php' method='post'>
					<input type='hidden' name='mode' value='user_save_edit'>
					<input type='hidden' name='id' value='$h[id]'>
					<table class='table'>
					<tr>
						<td>Full Name:</td>
						<td><input type='text' name='full_name' value='$h[full_name]'></td>
					</tr>
					<tr>
						<td>User Name:</td>
						<td><input type='text' name='user_name' placeholder='diisi hanya jika user name lama akan diganti'></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type='password' name='password' title='diisi hanya jika password lama akan diganti'></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td>
							<select name='status' value='$h[status]'>
								<option ".($h["status"]=="customer"?"selected":"").">customer</option>
								<option ".($h["status"]=="employee"?"selected":"").">employee</option>
								<option ".($h["status"]=="administrator"?"selected":"").">administrator</option>
							</select>
						</td>
					</tr>
				</table>
			</form>
			<br><br>
			<a href='user.php?mode=user_manager'><button class='cancel'>Cancel</button></a>
			<button class='save' onclick=document.getElementById('user_save_edit').submit()>Save</button>
			<br>
		</div>";
	}
}
//-----------------------------------------------------------------------------------------------
elseif($_POST["mode"]=="user_save_edit"){
	mysqli_query($con,"UPDATE user SET full_name='$_POST[full_name]',".
	($_POST["user_name"]==""?"":"user_name=md5('$_POST[user_name]'),").
	($_POST["password"]==""?"":"password=md5('$_POST[password]'),").
	"status='$_POST[status]' WHERE id='$_POST[id]'");
	
	header("Location:user.php?mode=user_manager");
}
//-----------------------------------------------------------------------------------------------
elseif($_GET["mode"]=="user_new"){
	echo
		"<div class='div'>
			<h1>New User</h1>
			<form id='user_save_new' action='user.php' method='post'>
				<input type='hidden' name='mode' value='user_save_new'>
				<input type='hidden' name='id' value=''>
				<table class='table'>
					<tr>
						<td>Full Name:</td>
						<td><input type='text' name='full_name' value=''></td>
					</tr>
					<tr>
						<td>User Name:</td>
						<td><input type='text' name='user_name' placeholder='diisi hanya jika user name lama akan diganti'></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type='password' name='password' title='diisi hanya jika password lama akan diganti'></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td>
							<select name='status' value=''>
								<option>customer</option>
								<option>employee</option>
								<option>administrator</option>
							</select>
						</td>
					</tr>
				</table>
			</form>
			<br><br>
			<a href='user.php?mode=user_manager'><button class='cancel'>Cancel</button></a>
			<button class='save' onclick=document.getElementById('user_save_new').submit()>Save</button>
			<br>
		</div>";
}
//-----------------------------------------------------------------------------------------------
elseif($_POST["mode"]=="user_save_new"){
	mysqli_query($con,"INSERT INTO user 
	(full_name,user_name,password,status)
	VALUES ('$_POST[full_name]',md5('$_POST[user_name]'),
	md5('$_POST[password]'),'$_POST[status]')");
	
	header("Location:user.php?mode=user_manager");
}
//-----------------------------------------------------------------------------------------------
elseif($_POST["mode"]=="customer_save_new"){
	mysqli_query($con,"INSERT INTO user 
	(full_name,user_name,password,status)
	VALUES ('$_POST[full_name]',md5('$_POST[user_name]'),
	md5('$_POST[password]'),'$_POST[status]')");
	
	header("Location:index.php");
}
//-----------------------------------------------------------------------------------------------
elseif($_GET["mode"]=="user_delete"){
	mysqli_query($con,"DELETE FROM user WHERE id='$_GET[id]'");
	
	header("Location:user.php?mode=user_manager");
}
//-----------------------------------------------------------------------------------------------
elseif($_GET["mode"]=="daftar"){
	echo
		"<div class='div'>
			<h1>New Customer</h1>
			<form id='customer_save_new' action='user.php' method='post'>
				<input type='hidden' name='mode' value='customer_save_new'>
				<input type='hidden' name='id' value=''>
				<input type='hidden' name='status' value='customer'>
				<table class='table'>
					<tr>
						<td>Full Name:</td>
						<td><input type='text' name='full_name' value=''></td>
					</tr>
					<tr>
						<td>User Name:</td>
						<td><input type='text' name='user_name'></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type='password' name='password'></td>
					</tr>
				</table>
			</form>
			<br><br>
			<a href='index.php'><button class='cancel'>Cancel</button></a>
			<button class='save' onclick=document.getElementById('customer_save_new').submit()>Save</button>
			<br>
		</div>";
}
//-----------------------------------------------------------------------------------------------
?>
</body>
</html>
<?php

include('config.php');

session_start();

$username = $_POST['username'];
$kata_sandi = md5($_POST['kata_sandi']);

$sql = mysql_query("SELECT * FROM admin WHERE username='$username' AND kata_sandi='kata_sandi'");
$res = mysql_num_rows($sql);

if($res == true){
	$_SESSION['username'] = $username;
	header('Location: index.php');
}
else{
	header('Location: gagal.php');
}
?>
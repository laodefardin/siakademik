<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:login-guru.php?error1');
	break;
} else if (empty($username)) {
	header('location:login-guru.php?error=2');
	break;
} else if (empty($password)) {
	header('location:login-guru.php?error=3');
	break;
}

$q = mysql_query("SELECT * FROM guru where username='$username' AND password='$password'") or die (mysql_error());
$row = mysql_fetch_array ($q);

if (mysql_num_rows($q) == 1) {
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $row['nama_guru'];
    $_SESSION['kode'] = $row['kode_guru'];
    $_SESSION['gambar'] = $row['gambar'];	

	header('location:guru/nilai');
} else {
	header('location:login-guru.php?error=4');
}
?>
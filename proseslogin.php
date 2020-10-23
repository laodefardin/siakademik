<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index?error=username-dan-password-salah');
	break;
} else if (empty($username)) {
	header('location:index?error=username-anda-salah');
	break;
} else if (empty($password)) {
	header('location:index?error=password-anda-salah');
	break;
}

$q = mysql_query("select * from user where username='$username' and password='$password'");
$row = mysql_fetch_array ($q);

if (mysql_num_rows($q) == 1) {
	$_SESSION['username'] = $username;
	$_SESSION['fullname'] = $row['fullname'];
    $_SESSION['gambar'] = $row['gambar'];	

	header('location:admin/dashboard');
} else {
	header('location:index?error=username-dan-password');
}
?>
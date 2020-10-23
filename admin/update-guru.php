<?php
include "../conn.php";
$kode_guru     = $_POST['kode_guru'];
$nip           = $_POST['nip'];
$nama_guru     = $_POST['nama_guru'];
$kelamin       = $_POST['kelamin'];
$alamat        = $_POST['alamat'];
$no_telepon    = $_POST['no_telepon'];
$status_aktif  = $_POST['status_aktif'];
$username      = $_POST['username'];
$password      = $_POST['password'];
$gambar        = $_POST['gambar'];

$query = mysql_query("UPDATE guru SET nip='$nip', nama_guru='$nama_guru', kelamin='$kelamin', alamat='$alamat', no_telepon='$no_telepon', status_aktif='$status_aktif', username='$username', password='$password', gambar='$gambar' WHERE kode_guru='$kode_guru'")or die(mysql_error());
if ($query){
header('location:guru');	
} else {
	echo "gagal";
    }
?>
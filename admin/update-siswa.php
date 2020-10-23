<?php
include "../conn.php";
$kode_siswa    = $_POST['kode_siswa'];
$nis           = $_POST['nis'];
$nama_siswa    = $_POST['nama_siswa'];
$kelamin       = $_POST['kelamin'];
$agama         = $_POST['agama'];
$tempat_lahir  = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat        = $_POST['alamat'];
$no_telepon    = $_POST['no_telepon'];
$tahun_angkatan= $_POST['tahun_angkatan'];
$status        = $_POST['status'];
$username      = $_POST['username'];
$password      = $_POST['password'];

$query = mysql_query("UPDATE siswa SET nis='$nis', nama_siswa='$nama_siswa', kelamin='$kelamin', agama='$agama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_telepon='$no_telepon', tahun_angkatan='$tahun_angkatan', status='$status', username='$username', password='$password' WHERE kode_siswa='$kode_siswa'")or die(mysql_error());
if ($query){
header('location:siswa.php');	
} else {
	echo "gagal";
    }
?>
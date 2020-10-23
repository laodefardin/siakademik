<?php
include "../conn.php";
$kode_kelas   = $_POST['kode_kelas'];
$tahun_ajar   = $_POST['tahun_ajar'];
$kelas        = $_POST['kelas'];
$nama_kelas   = $_POST['nama_kelas'];
$kode_guru    = $_POST['kode_guru'];
$status_aktif = $_POST['status_aktif'];

$query = mysql_query("UPDATE kelas SET tahun_ajar='$tahun_ajar', kelas='$kelas', nama_kelas='$nama_kelas', kode_guru='$kode_guru', status_aktif='$status_aktif' WHERE kode_kelas='$kode_kelas'")or die(mysql_error());
if ($query){
header('location:kelas');	
} else {
	echo "gagal";
    }
?>
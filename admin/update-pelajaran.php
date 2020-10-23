<?php
include "../conn.php";
$kode_pelajaran = $_POST['kode_pelajaran'];
$nama_pelajaran = $_POST['nama_pelajaran'];
$keterangan     = $_POST['keterangan'];

$query = mysql_query("UPDATE pelajaran SET nama_pelajaran='$nama_pelajaran', keterangan='$keterangan' WHERE kode_pelajaran='$kode_pelajaran'")or die(mysql_error());
if ($query){
header('location:pelajaran');	
} else {
	echo "gagal";
    }
?>
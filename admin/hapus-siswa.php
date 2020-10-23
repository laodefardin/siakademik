<?php
include "../conn.php";
$kode_siswa = $_GET['kd'];

$query = mysql_query("DELETE FROM siswa WHERE kode_siswa='$kode_siswa'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'siswa'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'siswa'</script>";	
}
?>
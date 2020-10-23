<?php
include "../conn.php";
$kode_kelas = $_GET['kd'];

$query = mysql_query("DELETE FROM kelas WHERE kode_kelas='$kode_kelas'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'kelas'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'kelas'</script>";	
}
?>
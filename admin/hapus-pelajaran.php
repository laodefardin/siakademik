<?php
include "../conn.php";
$kode_pelajaran = $_GET['kd'];

$query = mysql_query("DELETE FROM pelajaran WHERE kode_pelajaran='$kode_pelajaran'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'pelajaran'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'pelajaran'</script>";	
}
?>
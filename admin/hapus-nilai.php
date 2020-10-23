<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysql_query("DELETE FROM nilai WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'nilai'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'nilai'</script>";	
}
?>
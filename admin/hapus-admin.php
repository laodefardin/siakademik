<?php
include "../conn.php";
$user_id = $_GET['kd'];

$query = mysql_query("DELETE FROM user WHERE user_id='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'admin'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'admin'</script>";	
}
?>
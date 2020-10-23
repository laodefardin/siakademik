<?php
include "../conn.php";
$semester      = $_POST['semester'];
$kode_pelajaran = $_POST['kode_pelajaran'];
$kode_guru      = $_POST['kode_guru'];
$kode_kelas     = $_POST['kode_kelas'];
$kode_siswa     = $_POST['kode_siswa'];
$nilai_tugas1   = $_POST['nilai_tugas1'];
$nilai_tugas2   = $_POST['nilai_tugas2'];
$nilai_uts      = $_POST['nilai_uts'];
$nilai_uas      = $_POST['nilai_uas'];
$keterangan     = $_POST['keterangan'];

/**$sqlCek="SELECT * FROM kelas WHERE nama_kelas='$nama_kelas' AND tahun_ajar='$tahun_ajar'";
	$qryCek=mysql_query($sqlCek) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Nama Kelas<b> $txtNamaKls </b> dengan <b>tahun ajaran</b> yang sama sudah dibuat";
	} else {}**/
    
$query = mysql_query("INSERT INTO nilai (semester, kode_pelajaran, kode_guru, kode_kelas, kode_siswa, nilai_tugas1, nilai_tugas2, nilai_uts, nilai_uas, keterangan) VALUES 
                      ('$semester', '$kode_pelajaran', '$kode_guru', '$kode_kelas', '$kode_siswa', '$nilai_tugas1', '$nilai_tugas2', '$nilai_uts', '$nilai_uas', '$keterangan')");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'nilai'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'nilai'</script>";	
}

?>
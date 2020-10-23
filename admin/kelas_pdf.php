<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
require('../fpdf17/fpdf.php');
require('../conn.php');


//Select the Products you want to show in your PDF file
//$result=mysql_query("SELECT * FROM daily_bbri where date like '%$periode%' ");

$result=mysql_query("SELECT kelas.*, guru.nama_guru FROM kelas
				LEFT JOIN guru ON kelas.kode_guru = guru.kode_guru
				WHERE kelas.kode_guru = guru.kode_guru ORDER BY kode_kelas ASC") or die(mysql_error());

//Initialize the 3 columns and the total
$column_kode_siswa = "";
$column_nis = "";
$column_nama = "";
$column_kelamin = "";
$column_agama = "";
$column_tempat = "";
/**$column_tanggal = "";
$column_alamat = "";
$column_telepon = "";
$column_tahun = "";
$column_status = "";**/

//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	$kode = $row["kode_kelas"];
    $nis = $row["tahun_ajar"];
    $nama = $row["kelas"];
    $kelamin = $row["nama_kelas"];
    $agama = $row["nama_guru"];
	$tempat = $row["status_aktif"];
    /**$tanggal = $row["tanggal_lahir"];
    $alamat = $row["alamat"];
    $telepon = $row["no_telepon"];
    $tahun = $row["tahun_angkatan"];
    $status = $row["status"];**/
    

	$column_kode_siswa = $column_kode_siswa.$kode."\n";
    $column_nis = $column_nis.$nis."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_kelamin = $column_kelamin.$kelamin."\n";
    $column_agama = $column_agama.$agama."\n";
    $column_tempat = $column_tempat.$tempat."\n";
    /**$column_tanggal = $column_tanggal.$tanggal."\n";
    $column_alamat = $column_alamat.$alamat."\n";
    $column_telepon = $column_telepon.$telepon."\n";
    $column_tahun = $column_tahun.$tahun."\n";
    $column_status = $column_status.$status."\n";**/
			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../foto/logo.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA KELAS',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'Sistem Informasi Nilai Siswa (SiNiS)',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(25,8,'Kode Kelas',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(25,8,'Tahun Ajaran',1,0,'C',1);
$pdf->SetX(55);
$pdf->Cell(20,8,'Kelas',1,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(25,8,'Nama Kelas',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(70,8,'Walikelas',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(35,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_kode_siswa,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(25,6,$column_nis,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(20,6,$column_nama,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(75);
$pdf->MultiCell(25,6,$column_kelamin,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(70,6,$column_agama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(35,6,$column_tempat,1,'C');

//Footer Table 
/**$pdf->SetFillColor(110,180,230);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(5);
$pdf->Cell(40,8,'Keterangan',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(160,8,$ket.'',1,0,'R',1);
$pdf->Ln();
$pdf->SetFillColor(110,180,230);
$pdf->Ln(10);
**/
//After Footer

/**$Y_Fields_Name_position = 150;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(15);
$pdf->Cell(40,8,'Kepala Sekolah,',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 170;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Hakko Bio Richard, Amd.Kom',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();**/

/**$pdf->SetY(-55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);
$pdf->Cell(30,10,'PT. BBG',0,0,'C');
$pdf->Cell(105);
$pdf->Cell(30,10,'PT. BBRI',0,0,'C');
$pdf->Ln(20);
$pdf->Cell(10);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
$pdf->Cell(107);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
**/
$pdf->Output();
}
?>

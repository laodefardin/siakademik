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

$result=mysql_query("SELECT * FROM pelajaran ORDER BY kode_pelajaran ASC") or die(mysql_error());

//Initialize the 3 columns and the total
$column_kode_siswa = "";
$column_nis = "";
$column_nama = "";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	$kode = $row["kode_pelajaran"];
    $nis = $row["nama_pelajaran"];
    $nama = $row["keterangan"];
    

	$column_kode_siswa = $column_kode_siswa.$kode."\n";
    $column_nis = $column_nis.$nis."\n";
    $column_nama = $column_nama.$nama."\n";

			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../foto/logo.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PELAJARAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'Sistem Informasi Akademik',0,0,'C');
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
$pdf->SetX(10);
$pdf->Cell(40,8,'Kode Kelas',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(110,8,'Tahun Ajaran',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'Kelas',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(40,6,$column_kode_siswa,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(110,6,$column_nis,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(40,6,$column_nama,1,'C');

$pdf->Output();
}
?>

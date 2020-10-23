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

$result=mysql_query("SELECT * From guru ORDER BY kode_guru") or die(mysql_error());

//Initialize the 3 columns and the total
$column_kode_siswa = "";
$column_nis = "";
$column_nama = "";
$column_kelamin = "";
$column_agama = "";
$column_tempat = "";
$column_tanggal = "";

//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	$kode = $row["kode_guru"];
    $nis = $row["nip"];
    $nama = $row["nama_guru"];
    $kelamin = $row["kelamin"];
    $agama = $row["alamat"];
	$tempat = $row["no_telepon"];
    $tanggal = $row["status_aktif"];
    

	$column_kode_siswa = $column_kode_siswa.$kode."\n";
    $column_nis = $column_nis.$nis."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_kelamin = $column_kelamin.$kelamin."\n";
    $column_agama = $column_agama.$agama."\n";
    $column_tempat = $column_tempat.$tempat."\n";
    $column_tanggal = $column_tanggal.$tanggal."\n";
			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('L','mm',array(297,210)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../foto/logo.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(125);
$pdf->Cell(30,10,'DATA GURU PENGAJAR',0,0,'C');
$pdf->Ln();
$pdf->Cell(125);
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
$pdf->Cell(20,8,'Kode',1,0,'C',1);
$pdf->SetX(25);
$pdf->Cell(25,8,'NIP',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(40,8,'Nama',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(25,8,'Kelamin',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(110,8,'Alamat',1,0,'C',1);
$pdf->SetX(225);
$pdf->Cell(40,8,'No Telepon',1,0,'C',1);
$pdf->SetX(265);
$pdf->Cell(27,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(20,6,$column_kode_siswa,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(25,6,$column_nis,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(40,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,6,$column_kelamin,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(110,6,$column_agama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(225);
$pdf->MultiCell(40,6,$column_tempat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(265);
$pdf->MultiCell(27,6,$column_tanggal,1,'C');

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

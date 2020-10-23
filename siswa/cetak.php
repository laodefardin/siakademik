<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../login-siswa');	
} else {
	include "../conn.php";
require('../fpdf17/fpdf.php');
require('../conn.php');


//Select the Products you want to show in your PDF file
//$result=mysql_query("SELECT * FROM daily_bbri where date like '%$periode%' ");
$siswa = $_SESSION['kode'];
                    
$result=mysql_query("SELECT siswa.kode_siswa, siswa.nis, siswa.nama_siswa,
                                        nilai.semester, pelajaran.nama_pelajaran,
                                        nilai.nilai_tugas1, nilai.nilai_tugas2,
                                        nilai.nilai_uts, nilai.nilai_uas, nilai.keterangan,
                                        kelas_siswa.jurusan
                                        FROM siswa, nilai, pelajaran, kelas_siswa
                                        WHERE siswa.kode_siswa=nilai.kode_siswa AND
                                        nilai.kode_pelajaran=pelajaran.kode_pelajaran AND 
                                        kelas_siswa.kode_siswa=siswa.kode_siswa AND
                                        siswa.kode_siswa='$siswa'") or die(mysql_error());

//Initialize the 3 columns and the total
$column_date = "";
$column_time = "";
$column_standmeter = "";
$column_factor = "";
$column_total = "";
$column_nilai = "";
$column_rata = "";

//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	$kode_siswa = $row["kode_siswa"];
    $nis = $row["nis"];
    $nama = $row["nama_siswa"];
    $jurusan = $row["jurusan"];
    $semester = $row["semester"];
	$date = $row["nama_pelajaran"];
    $time = $row["nilai_tugas1"];
    $standmeter = $row["nilai_tugas2"];
    $factor = $row["nilai_uts"];
    $total = $row["nilai_uas"];
    $ket = $row["keterangan"];
    $nilai = $row["nilai_tugas1"] + $row["nilai_tugas2"] + $row["nilai_uts"] + $row["nilai_uas"];
    $rata = $nilai / 4;	

	$column_date = $column_date.$date."\n";
	$column_time = $column_time.$time."\n";
	$column_standmeter = $column_standmeter.$standmeter."\n";
	$column_factor = $column_factor.$factor."\n";
	$column_total = $column_total.$total."\n";
    $column_nilai = $column_nilai.$nilai."\n";
    $column_rata = $column_rata.$rata."\n";		


//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../foto/logo.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA HASIL BELAJAR SISWA',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'Raport Siswa',0,0,'C');
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 40;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Kode Siswa : '.$kode_siswa,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 48;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'NIS : '.$nis,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 56;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Nama Siswa : '.$nama,0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 64;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Jurusan : '.$jurusan,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(45,8,'Semester : '.$semester,0,0,'R',1);
$pdf->Ln();
}
//Fields Name position
$Y_Fields_Name_position = 71;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Mata Pelajaran',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(20,8,'Tugas 1',1,0,'C',1);
$pdf->SetX(65);
$pdf->Cell(20,8,'Tugas 2',1,0,'C',1);
$pdf->SetX(85);
$pdf->Cell(20,8,'UTS',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(20,8,'UAS',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(40,8,'Total Nilai',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(40,8,'Nilai Rata Rata',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 79;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(40,6,$column_date,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_time,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(20,6,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(85);
$pdf->MultiCell(20,6,$column_factor,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(20,6,$column_total,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(40,6,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(40,6,$column_rata,1,'C');

//Footer Table
$pdf->SetFillColor(110,180,230);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(5);
$pdf->Cell(40,8,'Keterangan',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(160,8,$ket.'',1,0,'R',1);
$pdf->Ln();
$pdf->SetFillColor(110,180,230);
$pdf->Ln(10);

//After Footer

$Y_Fields_Name_position = 150;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
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
$pdf->Cell(40,8,'Hakko Bio Richard, A.Md Kom',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

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

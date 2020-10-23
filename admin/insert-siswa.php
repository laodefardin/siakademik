<?php
$namafolder="gambar_siswa/"; //tempat menyimpan file
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("ecommerce")  or die("Gagal");*/
include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $kode_siswa = $_POST['kode_siswa'];
		$nis= $_POST['nis'];
		$nama_siswa=$_POST['nama_siswa'];
        $kelamin=$_POST['kelamin'];
        $agama=$_POST['agama'];
        $tempat_lahir=$_POST['tempat_lahir'];
        $tanggal_lahir=$_POST['tanggal_lahir'];
        $alamat=$_POST['alamat'];
        $no_telepon=$_POST['no_telepon'];
        $tahun_angkatan=$_POST['tahun_angkatan'];
        $status=$_POST['status'];
        $username=$_POST['username'];
        $password=$_POST['password'];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO siswa(kode_siswa,nis,nama_siswa,kelamin,agama,tempat_lahir,tanggal_lahir,alamat,no_telepon,tahun_angkatan,status,username,password,gambar) VALUES
            ('$kode_siswa','$nis','$nama_siswa','$kelamin','$agama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telepon','$tahun_angkatan','$status','$username','$password','$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
			// echo "Gambar berhasil dikirim ke direktori".$gambar;
		/**	echo "<p>User Id  : $user_id</p>";
            echo "<p>Username : $username</p>";
            echo "<p>Password : $password</p>";
            echo "<p>Fullname : $fullname</p>";
            echo "<p>Gambar   : $gambar</p>";**/
            echo "<script>alert('Gambar Berhasil Di Input'); 
		window.location = 'siswa'</script>";	   
		} else {
		   echo "<script>alert('Gambar gagal dikirim'); 
		window.location = 'input-siswa'</script>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}

/*include "../conn.php";
$user_id  = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];

$query = mysql_query("INSERT INTO admin (user_id, username, password, fullname) VALUES ('$user_id', '$username', '$password', '$fullname')");
if ($query){
	echo "<script>alert('Data Admin Berhasil dimasukan!'); window.location = 'admin.php'</script>";	
} else {
	echo "<script>alert('Data Admin Gagal dimasukan!'); window.location = 'admin.php'</script>";	
}*/


?>
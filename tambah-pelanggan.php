<?php
include 'konek.php';

function pwd(){
	$pass="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
	$password=substr(str_shuffle($pass),0,6);
	return $password;
}


$NoMeter='';
$Username=$_POST['Email'];
$Password=pwd();
$NamaLengkap=$_POST['NamaLengkap'];
$Alamat=$_POST['Alamat'];
$Telp=$_POST['Telp'];
$Email=$_POST['Email'];
$Daya=$_POST['KodeTarif'];
$Level="Pelanggan";

$kode=mysqli_query($konek,"select*from tbtarif where Daya='$Daya'");
$baca=mysqli_fetch_array($kode);

$KodeTarif=$baca[0];

$sql="INSERT INTO tbuser values('','$NoMeter','$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','$Level','$KodeTarif')";
$query=mysqli_query($konek,$sql);

if ($query) {
	echo "<script>
		alert('Data Berhasil Ditambahkan');
		location.href='input-data-pelanggan.php';
	</script>";
}
else{
	echo "<script>
		alert('Data Gagal Ditambahkan');
		location.href='input-data-pelanggan.php';
	</script>";
}

?>
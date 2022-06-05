<?php  
include 'konek.php';

$NamaLengkap=$_POST['NamaLengkap'];
$Alamat=$_POST['Alamat'];
$Telp=$_POST['Telp'];
$Email=$_POST['Email'];
$Daya=$_POST['KodeTarif'];

$ambil=mysqli_query($konek,"select*from tbtarif where Daya='$Daya'");
$data=mysqli_fetch_array($ambil);

$KodeTarif=$data[0];

$edit=mysqli_query($konek,"update tbuser set NamaLengkap='$NamaLengkap',NamaLengkap='$NamaLengkap',Alamat='$Alamat',Telp='$Telp',Email='$Email',KodeTarif='$KodeTarif' where NamaLengkap='$NamaLengkap'");

if ($edit) {
	echo "<script>alert('Data Berubah');
	location.href='tampil-pelanggan.php';</script>";
}
else{
	echo "<script>alert('Data Tidak Berubah');
	location.href='edit-pelanggan.php';</script>";
}

?>
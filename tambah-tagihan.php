<?php
include 'konek.php';

function nota(){
	$tagih="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
	$NoTagihan=substr(str_shuffle($tagih),0,6);
	return $NoTagihan;
}

$NoTagihan=nota();
$KodeUser=$_POST['KodeUser'];
$BulanTagih=$_POST['BulanTagih'];
$TahunTagih=$_POST['TahunTagih'];
$Pemakaian=$_POST['Pemakaian'];

$baca=mysqli_query($konek,"select*from tbuser where KodeUser='$KodeUser'");
$baca1=mysqli_fetch_array($baca);

$KodeTarif=$baca1[9];

$ambil=mysqli_query($konek,"select*from tbtarif where KodeTarif='$KodeTarif'");
$ambil1=mysqli_fetch_array($ambil);

$TarifPerKWH=$ambil1[2];
$Beban=$ambil1[3];

$TotalBayar=($Pemakaian*$TarifPerKWH)+$Beban;
$Status="Belum Lunas";

$sql=mysqli_query($konek,"insert into tbtagihan values('','$NoTagihan','$KodeUser','$KodeTarif','$BulanTagih','$TahunTagih','$Pemakaian','$TotalBayar','$Status')");

if ($sql) {
	echo "<script>
		alert('Data Berhasil Ditambahkan');
		location.href='tampil-tagihan.php';
	</script>";
}
else {
	echo "<script>
		alert('Data Gagal Ditambahkan');
		location.href='tampil-tagihan.php';
	</script>";
}


?>
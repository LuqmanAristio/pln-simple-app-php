<?php  
include 'konek.php';

$KodeTagihan=$_POST['KodeTagihan'];
$Bulan=$_POST['BulanTagih'];
$Tahun=$_POST['TahunTagih'];
$Pemakaian=$_POST['Pemakaian'];

$sql=mysqli_query($konek,"select*from tbtagihan inner join tbtarif on tbtarif.KodeTarif=tbtagihan.KodeTarif");
$query=mysqli_fetch_array($sql);

$TarifPerKWH=$query[11];
$Beban=$query[12];

$TotalBayar=($Pemakaian*$TarifPerKWH)+$Beban;


$edit=mysqli_query($konek,"update tbtagihan set KodeTagihan='$KodeTagihan',BulanTagih='$Bulan',TahunTagih='$Tahun',Pemakaian='$Pemakaian',TotalBayar='$TotalBayar' where KodeTagihan='$KodeTagihan'");

if ($edit) {
	echo "<script>alert('Data Berubah');
	location.href='tampil-tagihan.php';</script>";
}
else{
	echo "<script>alert('Data Tidak Berubah');
	location.href='edit-tagihan.php';</script>";
}

?>
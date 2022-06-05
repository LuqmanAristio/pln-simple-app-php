<?php  
include 'konek.php';

$KodeTagihan=$_GET['KodeTagihan'];
$Status="Belum Lunas";

$edit=mysqli_query($konek,"update tbtagihan set Status='$Status' where KodeTagihan='$KodeTagihan'");
$edit1=mysqli_query($konek,"delete from tbpembayaran where KodeTagihan='$KodeTagihan'");

if ($edit && $edit1) {
		echo "<script>alert('Data Berhasil Diubah');
		location.href='verifikasi.php';</script>";
}
else{
	echo "<script>alert('Data Tidak Berubah');
	location.href='verifikasi.php';</script>";
}

?>
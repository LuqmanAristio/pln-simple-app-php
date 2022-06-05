<?php
include 'konek.php';

$NoTagihan=$_POST['NoTagihan'];
$JenisPembayaran=$_POST['JenisPembayaran'];
$NoRek=$_POST['NoRek'];
$AtasNama=$_POST['AtasNama'];
$TglTransfer=$_POST['TglTransfer'];
$Nominal=$_POST['Nominal'];
$KodeTagihan=$_POST['KodeTagihan'];
$Status="Proses";

$sql=mysqli_query($konek,"select*from tbtagihan where NoTagihan='$NoTagihan'");
$query=mysqli_fetch_array($sql);

$TotalBayar=$query[7];

$hitung=$TotalBayar-$Nominal;

if ($hitung<=0) {
	$filename=$_FILES["Bukti"]["name"];
	$extension=explode(".", $filename);
	$extension=$extension[1];
	$BuktiPembayaran=uniqid().".$extension";
	$tmp_name=$_FILES['Bukti']['tmp_name'];

	// die($BuktiPembayaran);

	// die();

	move_uploaded_file($tmp_name, "gambardb/$BuktiPembayaran");

	$Status="Proses";
	$update=mysqli_query($konek,"update tbtagihan set NoTagihan='$NoTagihan', Status='$Status',TotalBayar='$TotalBayar' where NoTagihan='$NoTagihan'");

	$tambah=mysqli_query($konek,"insert into tbpembayaran values('','$NoTagihan','$JenisPembayaran','$NoRek','$AtasNama','$TglTransfer','$Nominal','$Status','$KodeTagihan','$BuktiPembayaran')");

if ($tambah) {
		echo "<script>alert('Data Berhasil Ditambahkan');
	location.href='data-tagihan-pelanggan.php';</script>";
}
else {
		echo "<script>alert('Data Gagal Ditambahkan');
	location.href='pembayaran-tagihan.php';</script>";
}

}
else{
	echo "<script>alert('Nominal Pembayaran Tidak Cukup');
 	location.href='pembayaran-tagihan.php?KodeTagihan=$KodeTagihan';</script>";
}

// 	$Status="Belum Lunas";
// 	$update=mysqli_query($konek,"update tbtagihan set NoTagihan='$NoTagihan', TotalBayar='$TotalBayar' where NoTagihan='$NoTagihan'");

// 	$tambah=mysqli_query($konek,"insert into tbpembayaran values('','$NoTagihan','$JenisPembayaran','$NoRek','$AtasNama','$TglTransfer','$Nominal','$Status','$KodeTagihan','$BuktiPembayaran')");

// if ($tambah) {
// 		echo "<script>alert('Data Berhasil Ditambahkan');
// 	location.href='data-tagihan-pelanggan.php';</script>";
// }
// else {
// 		echo "<script>alert('Data Gagal Ditambahkan');
// 	location.href='pembayaran-tagihan.php';</script>";
// }



?>
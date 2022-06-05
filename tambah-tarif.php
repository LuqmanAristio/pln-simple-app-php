<?php
include 'konek.php';

$Daya=$_POST['Daya'];
$Tarif=$_POST['TarifPerKWH'];
$Beban=$_POST['Beban'];

$tambah=mysqli_query($konek,"INSERT INTO tbtarif values('','$Daya','$Tarif','$Beban')");

if($tambah){
	echo "<script>
		alert('Data Berhasil Ditambahkan');
		location.href='input-data-tarif.php';
	</script>";
}
else{
	echo "<script>
		alert('Data Gagal Ditambahkan');
		location.href='input-data-tarif.php';
	</script>";
}




?>
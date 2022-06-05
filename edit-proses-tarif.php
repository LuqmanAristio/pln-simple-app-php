<?php  
include 'konek.php';

$KodeTarif=$_POST['KodeTarif'];
$Daya=$_POST['Daya'];
$TarifPerKWH=$_POST['TarifPerKWH'];
$Beban=$_POST['Beban'];

$edit=mysqli_query($konek,"update tbtarif set KodeTarif='$KodeTarif',Daya='$Daya',TarifPerKWH='$TarifPerKWH',Beban='$Beban' where KodeTarif='$KodeTarif'");

if ($edit) {
	echo "<script>alert('Data Berubah');
	location.href='tampil-tarif.php';</script>";
}
else{
	echo "<script>alert('Data Tidak Berubah');
	location.href='edit-tarif.php';</script>";
}

?>
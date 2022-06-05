<?php
include 'konek.php';

$KodeTarif=$_GET['KodeTarif'];

$hapus=mysqli_query($konek,"delete from tbtarif where KodeTarif='$KodeTarif'");

if ($hapus)
{
	echo "<script> alert ('Data Terhapus'); location.href='tampil-tarif.php'; </script>";
}

else 
{
	echo "<script> alert ('Data Gagal Dihapus); location.href='tampil-tarif.php'; </script>";
}


?>
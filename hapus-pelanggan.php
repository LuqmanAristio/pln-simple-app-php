<?php
include 'konek.php';

$KodeUser=$_GET['KodeUser'];

$hapus=mysqli_query($konek,"delete from tbuser where KodeUser='$KodeUser'");

if ($hapus)
{
	echo "<script> alert ('Data Terhapus'); location.href='tampil-pelanggan.php'; </script>";
}

else 
{
	echo "<script> alert ('Data Tidak Terhapus); location.href='tampil-pelanggan.php'; </script>";
}


?>
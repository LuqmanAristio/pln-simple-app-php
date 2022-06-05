<?php
include 'konek.php';

$KodePembayaran=$_GET['KodePembayaran'];

$hapus=mysqli_query($konek,"delete from tbpembayaran where KodePembayaran='$KodePembayaran'");

if ($hapus) {
	echo "<script>
		alert('Data Berhasil Dihapus');
		location.href='tampil-pembayaran.php';
	</script>";
}
else{
	echo "<script>
		alert('Data Gagal Dihapus');
		location.href='tampil-pembayaran.php';
	</script>";
}


?>
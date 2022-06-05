<?php
include 'konek.php';

$KodeTagihan=$_GET['KodeTagihan'];

$hapus=mysqli_query($konek,"delete from tbtagihan where KodeTagihan='$KodeTagihan'");

if ($hapus) {
	echo "<script>
		alert('Data Berhasil Dihapus');
		location.href='tampil-tagihan.php';
	</script>";
}
else{
	echo "<script>
		alert('Data Gagal Dihapus');
		location.href='tampil-tagihan.php';
	</script>";
}


?>
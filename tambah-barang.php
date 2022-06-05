<?php
extract($_REQUEST, EXTR_OVERWRITE);

error_reporting(0);

include 'konek.php';

$query=mysqli_query($konek,"insert into barang values ('','$namabarang','$stok','$hargadasar','$hargajual','$kategori')");

echo json_encode([["status"=>$query]]);

?>
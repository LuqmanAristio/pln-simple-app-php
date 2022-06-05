	<?php 

include 'konek.php';

function pwd(){
	$pass="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
	$password=substr(str_shuffle($pass),0,6);
	return $password;
}


$NoMeter='';
$Username=$_POST['Email'];
$Password=pwd();
$NamaLengkap=$_POST['NamaLengkap'];
$Alamat=$_POST['Alamat'];
$Telp=$_POST['Telp'];
$Email=$_POST['Email'];
$Level='Pelanggan';

$sql="INSERT INTO tbuser values('','$NoMeter','$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','$Level','0')";
$query=mysqli_query($konek,$sql);


// $query=mysqli_query($konek,"INSERT INTO tbuser values('','$NoMeter','$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','$Level','$KodeTarif')");


if ($query) {
	echo "<script>
		alert('Data Berhasil Ditambahkan ( Username=$Email & Password=$Password ) ');
		location.href='index.php';
	</script>";
}
else{
	echo "<script>
		alert('Data Gagal Ditambahkan');
		location.href='register.php';
	</script>";
}
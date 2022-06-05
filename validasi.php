<?php
include 'konek.php';

$Username=$_POST['Username'];
$Password=$_POST['Password'];

$sql=mysqli_query($konek,"SELECT*FROM tbuser where Username='$Username' AND Password='$Password'");
$query=mysqli_num_rows($sql);

if ($query>0) {

	$data = mysqli_fetch_assoc($sql);
 
	// cek jika user login sebagai admin
	if($data['Level']=="Admin"){
 
		// buat session login dan username
		session_start();
		$_SESSION['Username'] = $Username;
		$_SESSION['Level'] = "Admin";
		// alihkan ke halaman dashboard admin
		 echo "<script>alert('Selamat Datang');
			location.href='dashboard.php';</script>";
 
	// cek jika user login sebagai pegawai
	}
	else if($data['Level']=="Pelanggan"){
		// buat session login dan username
		session_start();
		$_SESSION['Username'] = $Username;
		$_SESSION['Level'] = "Pelanggan";
		// alihkan ke halaman dashboard pegawai
		echo "<script>alert('Selamat Datang');
			location.href='dashboard-pelanggan.php';</script>";
 
	// cek jika user login sebagai pengurus
	}
	else{
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}





	// session_start();
	// $_SESSION['Username']=$Username;

	// echo "<script>alert('Selamat Datang');
	// location.href='dashboard.php';</script>";
}
else{
	echo "<script>alert('Login Gagal');
	location.href='index.php';</script>";
}

?>
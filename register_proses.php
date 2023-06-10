<?php  
	session_start();
	include 'koneksi.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$telp	  = $_POST['konfirmasi'];
	$level	  = "";

	// if($password =! $konfirmasi){
	// 	header("location:login.php?message=password tidak sama");
	// }

	$sql = "INSERT INTO user VALUES('$username','$password','$level')";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("location:login.php?message=daftar_berhasil");
	} else {
		header("location:login.php?message=failed");
	}
?>
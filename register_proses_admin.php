<?php  
	session_start();
	include 'koneksi.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$telp	  = $_POST['telp'];
	$alamat	  = $_POST['alamat'];
	$level	  = $_POST['level'];

	$sql = "INSERT INTO user VALUES('$username','$password', '$telp','$alamat','$level')";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:login.php?message=daftar_berhasil");
	} else {
		header("Location:login.php?message=failed");
	}
?>
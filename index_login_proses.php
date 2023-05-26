<?php  
	session_start();
	include 'koneksi.php';

	$keranjangid 	= "";
	$username  		= $_POST['username'];
	$price  		= $_POST['price'];
	$productid		= $_POST['productid'];
	$quantity		= $_POST['quantity'];
	$catatanorder	= $_POST['catatanorder'];
	$total_harga	= $price*$quantity;
	

	$sql = "INSERT INTO keranjang VALUES('$keranjangid','$username', '$total_harga', '$productid', '$quantity', '$catatanorder')";
	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("location:index_login.php?message=tambah_berhasil");
	} else {
		header("location:index_login.php?message=failed");
	}
?>
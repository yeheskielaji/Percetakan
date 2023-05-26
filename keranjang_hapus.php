<?php
	include 'koneksi.php';

    $idhapus	= $_POST['idhapus'];

	$sql	= "DELETE from keranjang where keranjangid='$idhapus'";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect)); 

	if($query) {
		header("Location:keranjang.php");
	} else {
		echo "Hapus Data Gagal.";
	}
	
?>
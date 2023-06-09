<?php
	include 'koneksi.php';

    $idedit	= $_POST['idedit'];
	$quantity = $_POST['quantity'];
    // $catatanorder = $_POST['catatanorder'];
	$price = $_POST['price'];
	$total_harga=$price*$quantity;

	$sql	= "UPDATE keranjang SET quantity = '$quantity', total_harga = '$total_harga' WHERE keranjangid = '$idedit';";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:keranjang.php");
	} else {
		echo "Edit Data Gagal.";
	}
	
?>
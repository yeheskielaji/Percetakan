<?php
include 'koneksi.php';
	$foto		= $_FILES['file']['name'];
	$file_tmp	= $_FILES['file']['tmp_name'];
    $quantity = $_POST['quantity'];
    $total_harga = $_POST['total_harga'];
    $username = $_POST['username'];
    $productid = $_POST['productid'];
    
	move_uploaded_file($file_tmp, 'desain/'.$foto);

	
	$sql = "INSERT INTO pesanan(keranjangid, username, total_harga, productid, quantity, nego, file, desainerid, status) VALUES ('','$username','$total_harga','$productid','$quantity','0','$foto','-1','0')";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect)); 

	if($query) {
		header("Location:keranjang.php");
	
	} else {
		echo "Input Data Gagal.";
	}
	
?>
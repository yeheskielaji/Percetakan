<?php
include 'koneksi.php';
	$foto		= $_FILES['file']['name'];
	$file_tmp	= $_FILES['file']['tmp_name'];
	$keranjangid 	= $_POST['keranjangid'];
	$desainerid = $_POST['desainerid'];

    
	move_uploaded_file($file_tmp, 'desain/'.$foto);

	
	$sql    = "UPDATE pesanan SET status='3',file='$foto',desainerid='$desainerid' WHERE keranjangid='$keranjangid'";
	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect)); 

	if($query) {
		header("location:keranjang.php");
	
	} else {
		echo "Input Data Gagal.";
	}
	
?>
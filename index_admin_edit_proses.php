<?php
include 'koneksi.php';
	$foto		= $_FILES['foto']['name'];
	$file_tmp	= $_FILES['foto']['tmp_name'];
	$name 		= $_POST['name'];
	$price 		= $_POST['price'];
	$penjelasan = $_POST['penjelasan'];
	$productid	= $_POST['productid'];
	move_uploaded_file($file_tmp, 'img/'.$foto);

	
	$sql = "UPDATE product SET name='$name', price='$price', foto='$foto', penjelasan='$penjelasan' where productid='$productid'";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect)); 

	if($query) {
		header("location:index_admin.php");
	
	} else {
		echo "Input Data Gagal.";
	}
	
?>
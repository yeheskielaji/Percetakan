<?php
include 'koneksi.php';
	$foto		= $_FILES['foto']['name'];
	$file_tmp	= $_FILES['foto']['tmp_name'];
	$name 		= $_POST['name'];
	$price 		= $_POST['price'];
	$penjelasan = $_POST['penjelasan'];
	$productid	= "";
	move_uploaded_file($file_tmp, 'img/'.$foto);

	$sql	= "INSERT INTO product VALUES('$productid', '$name', '$price', '$foto', '$penjelasan')";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query)
	{
		header("location:index_admin.php");
	}
	else{
		echo "proses update gagal";
	}
?>
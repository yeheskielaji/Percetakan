<?php
	include 'koneksi.php';

	$productid 	= $_GET['productid'] ;

	$sql	= "DELETE FROM product WHERE productid ='$productid'" ;

	$query	= mysqli_query($connect,$sql);

	if($query) {
		header("location:index_admin.php") ;
	} else{
		echo "Hapus Data Gagal";
	} 
?>
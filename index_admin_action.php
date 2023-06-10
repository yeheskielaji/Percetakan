<?php
include 'koneksi.php';

$keranjangid 	= $_POST['keranjangid'];
$jenis = $_POST['jenis'];

if ($jenis == 1) {
	$sql    = "UPDATE pesanan SET status='2' WHERE keranjangid='$keranjangid'";
}
if ($jenis == 2) {
	$sql    = "UPDATE pesanan SET status='10' WHERE keranjangid='$keranjangid'";
}
if ($jenis == 3) {
	$desainerid = $_POST['desainerid'];
	$sql    = "UPDATE pesanan SET status='4',desainerid='$desainerid' WHERE keranjangid='$keranjangid'";
}
if ($jenis == 4) {
		$foto		= $_FILES['file']['name'];
	$file_tmp	= $_FILES['file']['tmp_name'];
	$desainerid = $_POST['desainerid'];
    
	move_uploaded_file($file_tmp, 'desain/'.$foto);
	$sql    = "UPDATE pesanan SET status='3',file='$foto',desainerid='$desainerid' WHERE keranjangid='$keranjangid'";

}

$query	= mysqli_query($connect, $sql);


if ($jenis == 3 || $jenis == 4) {
	if ($query) {
		header("location:index_desainer.php");
	} else {
		echo "Gagal";
	}
} else {

	if ($query) {
		header("location:index_admin.php");
	} else {
		echo "Gagal";
	}
}

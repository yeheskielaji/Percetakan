<?php
include 'koneksi.php';

$keranjangid 	= $_POST['keranjangid'];
$jenis = $_POST['jenis'];

if ($jenis==1) {
	$sql    = "UPDATE pesanan SET status='2' WHERE keranjangid='$keranjangid'";
}
if ($jenis==2) {
	$sql    = "UPDATE pesanan SET status='10' WHERE keranjangid='$keranjangid'";
}

$query	= mysqli_query($connect, $sql);

if ($query) {
	header("location:index_admin.php");
} else {
	echo "Gagal";
}

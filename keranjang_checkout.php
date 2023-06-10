<?php
include 'koneksi.php';
$total = $_POST['total'];
$username = $_POST['username'];

$insert = "INSERT INTO orderstatus VALUES('', NOW(), '$username', '$total')";
$query1    = mysqli_query($connect, $insert) or die(mysqli_error($connect));

foreach ($_POST['keranjang'] as $idkeranjang) {

$hapus    = "DELETE from keranjang where keranjangid='$idkeranjang'";
$query    = mysqli_query($connect, $hapus) or die(mysqli_error($connect));

}
header("location:keranjang.php");

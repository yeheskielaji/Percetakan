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
// $i = 0;
// foreach ($_POST['keranjang'] as $idkeranjang) {

//     $name = $_POST['name'][$i];
//     $i++;
//     $sql      = "Select * from keranjang where keranjangid='$idkeranjang'";
//     $query    = mysqli_query($connect, $sql);
//     while ($data = mysqli_fetch_array($query)) {
//         $username = $data['username'];
//         $total_harga = $data['total_harga'];
//         $productid = $data['productid'];
//         $quantity = $data['quantity'];
//     }
//     $insert = "INSERT INTO orderstatus VALUES('', NOW(), '$username', '$productid', '$total_harga', '$quantity', '$name')";
//     $query1    = mysqli_query($connect, $insert) or die(mysqli_error($connect));


// }

header("location:keranjang.php");

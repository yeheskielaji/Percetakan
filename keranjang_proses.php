<?php
	include 'koneksi.php';

    if ($_POST['jenis']=='1') {
        $idhapus	= $_POST['idhapus'];
        $sql	= "DELETE from pesanan where keranjangid='$idhapus'";
    }
    if ($_POST['jenis']=='2') {
        $idedit	= $_POST['idedit'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $total_harga=$price*$quantity;
        $sql	= "UPDATE pesanan SET quantity = '$quantity', total_harga = '$total_harga' WHERE keranjangid = '$idedit';";
    }

    if ($_POST['jenis']=='3') {
        $idedit	= $_POST['keranjangid'];
        $nego = $_POST['nego'];
        $sql	= "UPDATE pesanan SET nego = '$nego' WHERE keranjangid = '$idedit';";
    }



	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:keranjang.php");
	} else {
		echo "Gagal.";
	}
?>

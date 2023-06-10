<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?message=belum_login");
}
if ($_SESSION['level'] != "admin") {
    die("Anda Bukan Admin");
}

include('koneksi.php');
$username = $_SESSION['username'];
$sql = "SELECT pesanan.keranjangid, pesanan.quantity, pesanan.total_harga, pesanan.nego, user.username, product.name FROM pesanan JOIN user ON pesanan.username = user.username JOIN product ON pesanan.productid = product.productid WHERE pesanan.status = 5;";
$query    = mysqli_query($connect, $sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>PercetakanKU</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid  bg-light">
        <div class="row align-items-start">
            <div class="col-md-2 sidebar bg-white">
                <div style="list-style-type:none;">
                    <img src="asset/logo cetak.png" alt="">
                    <li class="nav-item active d-flex gap-1">
                        <img src="asset/dasboard.png" alt="">
                        <a class="nav-link" href="index_admin.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    </li>
                    <li class="nav-item active d-flex gap-1">
                        <img src="asset/invoice.png" alt="">
                        <a class="nav-link" href="index_admin_invoice.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Invoice</span></a>
                    </li>
                    <li class="nav-item active d-flex gap-1 fixed-bottom mb-5 pl-2">
                        <img src="asset/logout.png" alt="">
                        <a class="nav-link" href="logout.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Logout</span></a>
                    </li>
                </div>
            </div>

            <div class="col-md-10 content">
                <h1 class="mb-4 mt-4">Dashboard</h1>
                <div class="row bg-white pb-5">
                    <h5>Pesanan Pending</h5>
                    <table class="table mb-5">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Invoice id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Pesanan</th>
                                <th scope="col">Jml Pesanan</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td>#<?= $data['keranjangid'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['quantity'] ?></td>
                                    <td><?= number_format($data['total_harga']-$data['nego'], 0, "", ".") ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
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
$sql = "SELECT pesanan.keranjangid, user.username, product.name
FROM pesanan
JOIN user ON pesanan.username = user.username
JOIN product ON pesanan.productid = product.productid
WHERE pesanan.status = 2;";
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
    <div class="container-fluid bg-light">
        <div class="row align-items-start">
            <div class="col-md-2 sidebar bg-white">
                <div>
                    <img src="asset/logo cetak.png" alt="">
                    <a href="">
                        <h3>Dashboard</h3>
                    </a>
                    <a href="index_admin_invoice.php">
                        <h3>Invoice</h3>
                    </a>
                    <a href="">
                        <h3>pending</h3>
                    </a>
                </div>
                <div class="fixed-bottom text-center text-md-start justify-content-between" style="padding-bottom: 30px;">
                    <div class="mb-3 mb-md-0" style="color:grey;">
                        <a href="">logout<i class="bi bi-box-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-10 content">
                <h1 class="mb-4 mt-4">Dashboard</h1>
                <div class="row bg-white pb-5">
                    <h5>Desain Pending</h5>
                    <table class="table mb-5">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama Pelanggan</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td>#<?= $data['keranjangid'] ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <form action="index_admin_action.php" method="POST" class="pe-2">
                                                <input type="hidden" name="keranjangid" value="<?= $data['keranjangid'] ?>">
                                                <input type="hidden" name="jenis" value="1">
                                                <button class="btn btn-primary" type="submit">Terima</button>
                                            </form>
                                            <form action="index_admin_action.php" method="POST">
                                                <input type="hidden" name="keranjangid" value="<?= $data['keranjangid'] ?>">
                                                <input type="hidden" name="jenis" value="2">
                                                <button class="btn btn-danger" type="submit">Tolak</button>
                                            </form>
                                        </div>
                                    </td>
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
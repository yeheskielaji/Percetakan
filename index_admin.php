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
$sql = "SELECT a.keranjangid, a.total_harga, a.productid, a.quantity, a.file, a.nego, c.name, c.foto, c.price, a.status 
                            FROM pesanan a INNER JOIN product c 
                            ON a.productid=c.productid where a.status=1;";
$sqll = "SELECT a.keranjangid, a.total_harga, a.productid, a.quantity, a.file, a.nego, c.name, c.foto, c.price, a.status 
                            FROM pesanan a INNER JOIN product c 
                            ON a.productid=c.productid where a.status!=1 AND a.status!=10;";
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
                    <li class="nav-item active d-flex gap-1 fixed-bottom mb-5">
                        <img src="asset/logout.png" alt="">
                        <a class="nav-link" href="index_admin_invoice.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Logout</span></a>
                    </li>
                </div>
            </div>

            <div class="col-md-10 content">
                <h1 class="mb-4 mt-4" style="font-weight: bolder;">Dashboard</h1>
                <div class="row bg-white pb-5">
                    <h5>Pesanan Pending</h5>
                    <table class="table mb-5">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total Order</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Nego</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td>#<?= $data['keranjangid'] ?></td>
                                    <td><img src="img/<?= $data['foto'] ?>" alt="" width="35px" class="me-2"> <?= $data['name'] ?></td>
                                    <td><?= number_format($data['price'], 0, "", ".") ?></td>
                                    <td><?= $data['quantity'] ?></td>
                                    <td><?= number_format($data['total_harga'], 0, "", ".") ?></td>
                                    <td><?= number_format($data['nego'], 0, "", ".") ?></td>
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

                <div class="row bg-white mt-5">
                    <h5>Pesanan Diproses</h5>
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total Order</th>
                                <th scope="col">Harga Akhir</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $query    = mysqli_query($connect, $sqll);
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td>#<?= $data['keranjangid'] ?></td>
                                    <td><img src="img/<?= $data['foto'] ?>" alt="" width="35px" class="me-2"> <?= $data['name'] ?></td>
                                    <td><?= number_format($data['price'], 0, "", ".") ?></td>
                                    <td><?= $data['quantity'] ?></td>
                                    <td><?= number_format($data['total_harga'] - $data['nego'], 0, "", ".") ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <?php if ($data['status'] == '2') : ?>
                                                <p class="btn btn-primary" type="submit">Diterima</p>
                                            <?php elseif ($data['status'] == '3') : ?>
                                                <p class="btn btn-danger" type="submit">Proofing</p>
                                            <?php elseif ($data['status'] == '4') : ?>
                                                <p class="btn btn-success" type="submit">Dicetak</p>
                                            <?php endif; ?>
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
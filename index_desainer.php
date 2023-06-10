<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?message=belum_login");
}
if ($_SESSION['level'] != "desain") {
    die("Anda Bukan Desainer");
}

include('koneksi.php');
$username = $_SESSION['username'];
$sql = "SELECT pesanan.keranjangid, pesanan.file, user.username, product.name
FROM pesanan
JOIN user ON pesanan.username = user.username
JOIN product ON pesanan.productid = product.productid
WHERE pesanan.status = 2;";
$query    = mysqli_query($connect, $sql);

$sqld = "SELECT desainerid from desainer where username='$username'";
$queryd   = mysqli_query($connect, $sqld);
while ($data = mysqli_fetch_array($queryd)) {
    $desainerid=$data['desainerid'];
}

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
                                <th scope="col"></th>
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
                                        <div class="d-flex justify-content-center" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $data['keranjangid'] ?>">Lihat Desain</button>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdroph<?= $data['keranjangid'] ?>">Konfirmasi</button>
                                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#staticBackdroph1<?= $data['keranjangid'] ?>">Revisi</button>
                                        </div>

                                        <!-- modal -->
                                        <div class="modal fade" id="staticBackdrop<?= $data['keranjangid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Lihat Desain<br>#<?= $data['keranjangid'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card mx-auto w-75 shadow p-3 mb-3 bg-body-tertiary rounded">
                                                            <img src="desain/<?= $data['file'] ?>" class="card-img-top" alt="Shopping item">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="button" class="btn btn-white btn-outline-primary"><a href="desain/<?= $data['file'] ?>" target="_blank">Unduh</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal hapus -->
                                        <div class="modal fade" id="staticBackdroph<?= $data['keranjangid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="index_admin_action.php">
                                                        <div class="modal-body text-center">
                                                            <h5>Konfirmasi pesanan<br>#<?= $data['keranjangid'] ?></h5>
                                                            <input type="hidden" name="keranjangid" value=<?= $data['keranjangid'] ?>>
                                                            <input type="hidden" name="desainerid" value=<?= $desainerid ?>>
                                                            <input type="hidden" name="jenis" value="3">
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                            <button type="submit" class="btn btn-success">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal hapus -->
                                        <div class="modal fade" id="staticBackdroph1<?= $data['keranjangid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Revisi Desain<br>#<?= $data['keranjangid'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body"> 
                                                        <form action="index_admin_action.php" method="post" enctype="multipart/form-data">
                                                            <label for="fileInput" class="card mx-auto w-100 bg-secondary rounded-pills align-items-center">
                                                                <img src="asset/tambah.png" alt="Pilih Gambar" class="card-img-top pt-5 mt-5 pb-5 mb-5" style="width: 40%;">
                                                                <input id="fileInput" type="file" class="visually-hidden" name="file">
                                                                <p class="text-warning pb-5 mb-5">Add file .pdf .cdr .ai</p>
                                                            </label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="keranjangid" value=<?= $data['keranjangid'] ?>>
                                                        <input type="hidden" name="desainerid" value=<?= $desainerid ?>>
                                                        <input type="hidden" name="jenis" value="4">

                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-warning text-white">Revisi</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
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
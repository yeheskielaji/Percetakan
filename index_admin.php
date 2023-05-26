<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?message=belum_login");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Toko Medical</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg background-primary" style="height:60px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index_admin.php" style="font-weight:bolder; color:#00A445;">
                <img src="asset/logo putih.png" alt="logo" style="height: 25px; margin-top: -7px; padding-left: 4px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size:20px;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="color: #00A445;">
                        <a class="nav-link active text-white" aria-current="page" href="index_admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="index_admin#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="index_tambah.php">Tambah Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="register_admin.php">Register</a>
                    </li>
                </ul>
                <a class="d-flex" href="logout.php" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-light">Logout</button>
                </a>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-item-center">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="height:200px; margin: 90px 50px 130px; margin-left: 32px; ">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="asset/slide1.png" class="d-block w-90">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="asset/slide2.png" class="d-block w-90">
                </div>
                <div class="carousel-item">
                    <img src="asset/slide3.png" class="d-block w-90">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev" style="padding-top:60px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" style="padding-top:60px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div id="produk">
        <div class="p-3 m-0 border-0">
            <div class="container text-center">
                <div class="row">
                    <?php
                    include('koneksi.php');

                    $sql   = "SELECT * FROM product";
                    $query  = mysqli_query($connect, $sql);
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="m-2 p-1" style="height:270px;">
                                    <img src="img/<?php echo $data['foto']; ?>" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['name']; ?></h5>
                                    <h6 class="card-title">Rp. <?= number_format($data['price'], 0, "", ".") ?></h6>
                                    <div class="container py-2" style="height:140px;">
                                        <p class="card-text"><?= $data['penjelasan']; ?></p>
                                    </div>
                                    <a href=index_admin_delete.php?productid=<?php echo $data['productid']; ?>>
                                        <button type="button" class="btn btn-primary pt-1 pb-1 mb-2" style="background-color: #00A445; width: 80%;">
                                            Hapus Keranjang
                                        </button></a>
                                    <a href=index_admin_edit.php>
                                        <form action="index_admin_edit.php" method="post">
                                            <input type="hidden" name="productid" value="<?= $data['productid']; ?>">
                                            <input type="hidden" name="name" value="<?= $data['name']; ?>">
                                            <input type="hidden" name="penjelasan" value="<?= $data['penjelasan']; ?>">
                                            <input type="hidden" name="price" value="<?= $data['price']; ?>">
                                            <button type="submit" class="btn btn-primary pt-1 pb-1" style="background-color: #00A445; width: 80%;">
                                                Edit Keranjang
                                            </button>
                                    </a>
                                    </form>



                                    <div class="modal fade" id="staticBackdrop<?= $data['productid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <form method="POST" action="index_admin_edit.php">

                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukkan Pesanan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Jumlah barang
                                                        <input type="number" name="quantity" class="form-number text-center" min="1" id="customRange3" style="width: 50px; margin-right: -4px;" value="1">
                                                        <hr>
                                                        Tulis Catatan
                                                        <input class="card card-body" style="height: 5px; width: 100%" type="text" name="catatanorder">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary " style="background-color: #00A445;">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 mt-5 background-primary">
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2022. All rights reserved.
        </div>
    </div>
</body>


</html>
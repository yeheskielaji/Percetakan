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
    <title>Keranjang </title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- <script>
        function toggle(source) {
            checkboxes = document.querySelectorAll('[id$="_item"]');
            for (let i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function centang() {
            let total = document.querySelectorAll('[id$="_item"]:checked').length;
            document.getElementById("totalCentang").innerHTML = total;
        } -->
    </script>
</head>

<body style="font-family: 'Montserrat', sans-serif;">
    <nav class="navbar fixed-top navbar-expand-lg background-primary" style="height:60px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index_login.php" style="font-weight:bolder; color:#00A445;">
                <img src="asset/logo putih.png" alt="logo" style="height: 25px; margin-top: -7px; padding-left: 4px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size:20px;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="color: #00A445;">
                        <a class="nav-link active text-white" aria-current="page" href="index_login.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="index_login.php#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="riwayat.php">Riwayat</a>
                    </li>
                </ul>
                <a class="d-flex" href="logout.php" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-light">Logout</button>
                </a>
            </div>
        </div>
    </nav>
    <section class="vh-100">
        <div class="container text-start pt-5">
            <div class="row pt-5">
                <div class="col-1">
                </div>
                <!-- <form action="keranjang_proses.php" method="post"> -->
                <div class="col-7">
                    <h3>Keranjang</h3>
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cekPilih" onClick="toggle(this)" onchange="centang(0)">
                        <label class="form-check-label" for="cekPilih">
                            Pilih Semua
                        </label>
                    </div> -->

                    <div class="card">
                        <div class="card-body">

                            <!-- ganti barang -->
                            <?php
                            include('koneksi.php');
                            $username = $_SESSION['username'];
                            $sql = "SELECT a.keranjangid, a.total_harga, a.productid, a.quantity, a.catatanorder, c.name, c.penjelasan, c.foto, c.price 
                            FROM keranjang a INNER JOIN product c 
                            ON a.productid=c.productid where a.username='$username';";

                            $query    = mysqli_query($connect, $sql);
                            $jumlah = 0;
                            $totalharga = 0;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>

                                <div class="card border-light">
                                    <div class="card-body">
                                        <!-- <input class="form-check-input" type="checkbox" id="<?= $data['keranjangid'] ?>_item" name="keranjang[]" value="<?= $data['keranjangid'] ?>" onchange="centang()"> -->
                                        <label class="form-check-label" for="item">
                                            <h5><?= $data['name'] ?></h5>
                                        </label>
                                        <div class="ps-3">
                                            <div class="d-flex" style="height:100px;">
                                                <img src="img/<?= $data['foto'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="object-fit: contain; width:100px">
                                                <p class="ps-4"><?= $data['penjelasan'] ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h5>Rp<?= number_format($data['price'], 0, "", ".") ?> x <?= $data['quantity'] ?></h5>
                                                <h5>Rp<?= number_format($data['total_harga'], 0, "", ".") ?></h5>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <p> Catatan :</p>
                                                <p style="text-decoration:none;"><?= $data['catatanorder'] ?>
                                                <p>
                                            </div>
                                        </div>

                                        <div class="d-flex ps-3 justify-content-end">

                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-default pt-0 pb-1 px-1">
                                                    <img src="img/sampah.svg" width="18px" class="pt-1 pb-1 mt-auto mb-auto" data-bs-toggle="modal" data-bs-target="#staticBackdroph<?= $data['keranjangid'] ?>">
                                                </button>



                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary pt-1 pb-1 mt-auto mb-auto" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $data['keranjangid'] ?>" style="background-color: #00A445;">
                                                    Edit Pesanan
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop<?= $data['keranjangid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Pesanan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="keranjang_edit.php">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="price" value="<?= $data['price'] ?>">
                                                                    <input type="hidden" name="idedit" value=<?= $data['keranjangid'] ?>>
                                                                    Ganti Jumlah barang
                                                                    <input type="number" class="form-number text-center" min="1" name="quantity" style="width: 50px;" value=<?= $data['quantity'] ?>>
                                                                    <hr>
                                                                    Tulis Catatan
                                                                    <input class="card card-body" style="height: 5px;" type="text" name="catatanorder" value=<?= $data['catatanorder'] ?>>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary" style="background-color: #00A445;">Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal hapus -->
                                                <div class="modal fade" id="staticBackdroph<?= $data['keranjangid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="POST" action="keranjang_hapus.php">
                                                                <div class="modal-body text-center">
                                                                    <h5>Yakin ingin hapus dari keranjang?</h5>
                                                                    <input type="hidden" name="idhapus" value=<?= $data['keranjangid'] ?>>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                    <button type="submit" class="btn btn-danger">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse" id="catatan2" style="width: 130px;">
                                            <input class="card card-body" style="height: 5px;" type="text">
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $jumlah++;
                                $totalharga = $totalharga + $data['total_harga'];
                            }
                            ?>
                        </div>
                        <!-- jumlah  -->
                        <!-- Kolom kanan Berisi total -->
                    </div>
                </div>
                <div class="col-4 fixed-top offset-8 my-5 py-5">
                    <div class="card w-75">
                        <div class="card-body">
                            <h5 class="card-title">Ringkasan Belanja</h5>
                            <p class="card-text">
                            <div class="d-flex justify-content-between">
                                <div>Total Harga (<?= $jumlah ?> barang)</div>
                                <div><?= number_format($totalharga, 0, "", ".") ?></div>
                            </div>
                            </p>
                            <hr>
                            <h5 class="card-text pb-2">
                                <div class="d-flex justify-content-between">
                                    <div>Total Harga</div>
                                    <div><?= number_format($totalharga, 0, "", ".") ?></div>
                                </div>
                            </h5>
                            <form action="keranjang_proses.php" method="post">
                                <?php
                                $query1    = mysqli_query($connect, $sql);
                                while ($data1 = mysqli_fetch_array($query1)) {
                                ?>
                                    <input type="hidden" name="keranjang[]" value="<?= $data1['keranjangid'] ?>">
                                    <input type="hidden" name="name[]" value="<?= $data1['name'] ?>">
                                    <input type="hidden" name="total" value="<?= $totalharga ?>">
                                    <input type="hidden" name="username" value="<?= $username ?>">
                                <?php } ?>
                                <button type="submit" class="btn btn-primary d-grid gap-2" style="background-color:#00A445; width:100%;">Beli</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- <script src="js/scripts.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
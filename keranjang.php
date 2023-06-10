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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <nav class="navbar fixed-top mx-auto" style="height:60px; background: white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-weight:bolder;">
                <img src="asset/logo navbar.png" alt="logo" style="height: 30px; padding-left: 4px;"></a>
            <a class="login-min d-flex" href="login.php" style="text-decoration: none;">
                <button type="button" class="btn btn-outline-warning">Login</button>
            </a>
        </div>
        </div>
    </nav>
    <section class="vh-100">
        <div class="container text-start pt-5">
            <div class="row pt-5">
                <div class="col-1">
                </div>
                <div class="col-10">
                    <h3>Keranjang</h3>

                    <!-- <div class="card">
                        <div class="card-body"> -->

                    <!-- ganti barang -->
                    <?php
                    include('koneksi.php');
                    $username = $_SESSION['username'];
                    $sql = "SELECT a.keranjangid, a.total_harga, a.productid, a.quantity, a.file, c.name, c.foto, c.price 
                            FROM pesanan a INNER JOIN product c 
                            ON a.productid=c.productid where a.username='$username';";

                    $query    = mysqli_query($connect, $sql);
                    $jumlah = 0;
                    $totalharga = 0;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="d-flex justify-content-between align-items-center">

                            <img src="img/<?= $data['foto'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="object-fit: contain; width:75px">
                            <div class="d-flex justify-content-start">
                                <h6 class="pe-2"><?= $data['quantity'] ?> pcs</h6>
                                <h6><?= number_format($data['total_harga'], 0, "", ".") ?></h6>
                            </div>
                        </div>
                        <div class="row justify-content-center pt-2">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary btn-lg " data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $data['keranjangid'] ?>"><img src="img/edit.png" width="18px"></button>
                                <button type="button" class="btn btn-secondary btn-lg " data-bs-toggle="modal" data-bs-target="#staticBackdroph<?= $data['keranjangid'] ?>"><img src="img/hapus.png" width="18px"></button>
                            </div>

                            <!-- modal -->
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
                                                <!-- Tulis Catatan
                                                            <input class="card card-body" style="height: 5px;" type="text" name="catatanorder" value=<?= $data['catatanorder'] ?>> -->
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

                            <form action="keranjang_nego.php" method="post" class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn btn-danger text-dark rounded-pill">Nego Harga</button>
                            </form>

                        </div>
                    <?php
                        $jumlah++;
                        $totalharga = $totalharga + $data['total_harga'];
                    }
                    ?>
                </div>
                <div class="col-1">
                </div>

            </div>
        </div>
    </section>
    <div class="container fixed-bottom bg-white pb-5 mb-5 mt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <p class="card-text">
                        <?php
                        $query    = mysqli_query($connect, $sql);
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                    <div class="d-flex justify-content-between">
                        <div><?= $data['name'] ?></div>
                        <div><?= number_format($data['total_harga'], 0, "", ".") ?></div>
                    </div>
                <?php } ?>
                <div class="d-flex justify-content-between">
                    <div>Nego</div>
                    <div><?= number_format(0, 0, "", ".") ?></div>
                </div>
                </p>
                <hr>
                <h5 class="card-text pb-2">
                    <div class="d-flex justify-content-between">
                        <div>Total</div>
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
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-lg text-light rounded-pill">Checkout</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <nav class="navbar fixed-bottom bg-body-tertiary" style="height:60px; background: white;">
  <div class="container text-center ">
    <div class="row gap-5 mx-auto" style="font-size:18px;">
      <div class="col">
      <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house "></i></a>
      </div>
      <div class="col">
      <a class="nav-link" href=""><i class="bi bi-bell"></i></a>
      </div>
      <div class="col">
      <a class="nav-link " href=""><i class="bi bi-plus"></i></a>
      </div>
      <div class="col">
      <a class="nav-link " href="keranjang.php"><i class="bi bi-cart"></i></a>
      </div>
      <div class="col">
      <a class="nav-link" href="riwayat.php"><i class="bi bi-gear"></i></a>
      </div>
    </div>
  </div>
</nav>
    <!-- <script src="js/scripts.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
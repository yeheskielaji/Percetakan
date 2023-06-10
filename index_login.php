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
    <title>Percetakaan</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar fixed-top mx-auto" style="height:60px; background: white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-weight:bolder;">
                <img src="asset/logo navbar.png" alt="logo" style="height: 30px; padding-left: 4px;"></a>
            <a class="login-min d-flex color-primary align-self-center" href="user.php" style="text-decoration: none; font-size:28px;">
                <i class="bi bi-person-circle "></i>
            </a>
        </div>
        </div>
    </nav>
    <div class="input-group mb-3 mx-auto" style="padding-top: 80px; width:380px;">
        <input type="text" class="form-control" placeholder="search" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
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
                            <a href="tambahorder.php?id=<?=$data['productid']?>" style="text-decoration: none;">
                                <div class="card mx-auto" style="width: 18rem;">
                                    <div class="foto-produk m-2 p-1" style="height:110px;">
                                        <img src="img/<?php echo $data['foto']; ?>" class="card-img-top">
                                    </div>
                                    <div class="card-body" style="color: black;">
                                        <h5 class="card-title"><?= $data['name']; ?></h5>
                                        <h6 class="card-title">Rp. <?= number_format($data['price'], 0, "", ".") ?></h6>
                                    </div>
                                </div>
                            </a>
                            <br>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar fixed-bottom bg-body-tertiary" style="height:60px; background: white;">
        <div class="container text-center ">
            <div class="row gap-5 mx-auto" style="font-size:18px;">
                <div class="col">
                    <a class="nav-link active" aria-current="page" href="index_login.php"><i class="bi bi-house "></i></a>
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
</body>
</html>

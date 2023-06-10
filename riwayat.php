<?php
session_start();
if (empty($_SESSION['username'])) {
    header("Location:login.php?message=belum_login");
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pembelian</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script>
        function toggle(source) {
            checkboxes = document.querySelectorAll('[id$="_item"]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
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
                <div class="col-7">
                    <h3>Riwayat Pembelian</h3>
                    <div class="form-check">
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <h4>Waktu</h4>
                                        </th>
                                        <th scope="col">
                                            <h4>Total Harga</h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('koneksi.php');
                                    $username = $_SESSION['username'];
                                    $sql = "SELECT * FROM orderstatus where username='$username';";
                                    $query    = mysqli_query($connect, $sql);
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <h5><?= $data['waktu'] ?></h5>
                                            </td>
                                            <td>
                                                <h5>Rp. <?= number_format($data['total_harga'], 0, "", ".") ?></h5>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section>
    <!-- <script src="js/scripts.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
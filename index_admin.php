<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?message=belum_login");
}
if ($_SESSION['level'] != "admin") {
	die("Anda Bukan Admin");
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
    <div class="row align-items-start">
    <div class="col-2">
        <div>
            <img src="asset/logo cetak.png" alt="">
            <a href="" style="text-decoration: none;"><h3>Dashboard</h3></a>
            <a href="" style="text-decoration: none;"><h3>Invoice</h3></a>
            <a href="" style="text-decoration: none;"><h3>pending</h3></a>
        </div>
        <div class="fixed-bottom text-center text-md-start justify-content-between" style="padding-bottom: 30px;">
            <div class="mb-3 mb-md-0" style="color:grey;">
                <a href="" style="text-decoration: none;">logout<i class="bi bi-box-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-10">
        <table class="table">
            <thead class="text-center">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Username</th>
                <th scope="col">Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Nego</th>
                <th colspan="2">Status</th>
                </tr>
            </thead>
            <tbod class="text-center">
                <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</body>


</html>
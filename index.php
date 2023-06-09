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
  <nav class="navbar nav-large fixed-top navbar-expand-lg" style="height:60px; background: white;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php" style="font-weight:bolder;">
        <img src="asset/logo navbar.png" alt="logo" style="height: 30px; padding-left: 4px;"></a>
      <a class="login-min d-flex" href="login.php" style="text-decoration: none;">
        <button type="button" class="btn btn-outline-warning">Login</button>
      </a>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size:20px;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item" style="color: #00A445;">
            <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="index.php#produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="keranjang.php">Keranjang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="riwayat.php">Riwayat</a>
          </li>
        </ul> -->
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
              <div class="card" style="width: 18rem;">
                <div class="foto-produk m-2 p-1" style="height:270px;">
                  <img src="img/<?php echo $data['foto']; ?>" class="card-img-top">
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?= $data['name']; ?></h5>
                  <h6 class="card-title">Rp. <?= number_format($data['price'], 0, "", ".") ?></h6>
                  <div class="penjelasan container py-2" style="height:140px;">
                    <p class="card-text"><?= $data['penjelasan']; ?></p>
                  </div>
                  <a href=index_admin_edit.php>
                    <button type="button" class="btn btn-primary pt-1 pb-1" style="background-color: #00A445; width: 80%;">
                      Masukkan Keranjang
                    </button></a>
                </div>
              </div>
              <br>
            </div>
          <?php } ?>
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
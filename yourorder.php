<?php
session_start();
if (empty($_SESSION['username'])) {
    header("Location:login.php?message=belum_login");
}
$totalnego=0;

?>

<!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PercetakanKU</title>
        <link rel="stylesheet" href="style/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    </head>

    <body style="font-family: 'Montserrat', sans-serif;">
        <nav class="navbar fixed-top mx-auto" style="height:60px; background: white;">
            <div class="container-fluid">
                <div class="row gap-5 mx-auto color-primary" style="font-size:18px;">
                    <div class="col">
                        <a class="nav-link active" href="index_login.php" style="font-size: 28px;"><i class="bi bi-arrow-left-circle"></i></a>
                    </div>
                    <div class="col" >
                        <h1 class="fw-semibold">Account</h1>
                    </div>
                    <div class="col">
                        <a class="nav-link " href="" style="font-size: 28px;"><i class="bi bi-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="mx-auto" style="width:390px; padding-top: 120px">
     <?php
     include('koneksi.php');
     $username = $_SESSION['username'];
     $sql   = "SELECT * FROM pesanan WHERE username = '$username'";
     $query  = mysqli_query($connect, $sql);

     while ($data = mysqli_fetch_array($query)) {
        ?>


        <div class="form-outline mb-3 text-left">
            <table class="table">
             <tbody>
                <tr>
                  <td> Keranjang Id = <?=$data['keranjangid']?> <?php echo "<br>" ?> Username = <?= $data['username']?> <?php echo "<br>" ?>  Total Harga = <?= $data['total_harga']?> <?php echo "<br>" ?> Quantity =  <?= $data['quantity']?> <?php echo "<br>" ?> Nego = <?= $data['nego']?> <?php echo "<br>" ?>  Produk Id = <?= $data['productid']?> <?php echo "<br>" ?> Status = <?= $data['status']?></td>
              </tr>
          </tbody>
      </table>
  </div>
  <?php
}?>
</section>
<nav class="navbar fixed-bottom bg-body-tertiary" style="height:60px; background: white;">
    <div class="container text-center ">
        <div class="row gap-4 mx-auto" style="font-size:18px;">
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
                <a class="nav-link" href=""><i class="bi bi-gear"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- <script src="js/scripts.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
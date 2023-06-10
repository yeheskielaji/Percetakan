<?php
session_start();
if (empty($_SESSION['username'])) {
	header("Location:login.php?message=belum_login");
}

$keranjangid = $_POST['keranjangid'];

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nego Harga </title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</script>
</head>

<?php
include('koneksi.php');
$username = $_SESSION['username'];
$sql = "SELECT a.keranjangid, a.total_harga, a.productid, a.quantity, a.nego, c.name, c.foto, c.price 
		FROM pesanan a INNER JOIN product c 
		ON a.productid=c.productid AND a.keranjangid='$keranjangid' where a.username='$username';";

$query    = mysqli_query($connect, $sql);
?>

<body style="font-family: 'Montserrat', sans-serif;">

<nav class="navbar fixed-top mx-auto" style="height:60px; background: white;">
        <div class="container-fluid">
        <div class="row gap-4 mx-auto color-primary" style="font-size:18px;">
                <div class="col">
                    <a class="nav-link active" href="keranjang.php" style="font-size: 28px;"><i class="bi bi-arrow-left-circle"></i></a>
                </div>
                <div class="col" >
                    <h1 class="fw-semibold">Keranjang</h1>
                </div>
                <div class="col">
                    <a class="nav-link " href="" style="font-size: 28px;"><i class="bi bi-search"></i></a>
                </div>
            </div>
        </div>
        </div>
    </nav>

	<section class="vh-100 mt-5">
		<div class="container pt-5">
			<div class="row d-flex justify-content-center">
				<div class="col-10 text-center">
					<!-- <h3>Keranjang</h3> -->
					<?php
					while ($data = mysqli_fetch_array($query)) {
					?>
						<div class="card mx-auto w-75 shadow p-3 mb-3 bg-body-tertiary rounded">
							<img src="img/<?= $data['foto'] ?>" class="card-img-top" alt="Shopping item">
						</div>
						<?= $data['name']; ?>
						<?php $nego=$data['nego']; ?>
						<p class="bg-secondary text-warning p-2 mx-auto w-75 rounded-pill" style=" max-width: 10ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= $data['quantity']; ?> pcs</p>
						<h3 class="text-warning fw-bold"><?= number_format($data['total_harga'], 0, "", ".") ?></h3>
					<?php } ?>

				</div>
			</div>
		</div>

		<!-- bawah -->

	</section>
	<div class="container fixed-bottom bg-white pb-5 mb-5 mt-3">
		<div class="row d-flex justify-content-center">
			<div class="col-10 text-center">
				<h5 class="mb-4">Nego</h5>
				<form action="keranjang_proses.php" method="post">

					<input class="form-control bg-secondary p-3 rounded-pill mb-4 text-warning" type="number" name="nego" value="<?=$nego?>">
					<input type="hidden" name="keranjangid" value="<?=$keranjangid?>">
					<input type="hidden" name="jenis" value="3">
					<div class="d-grid gap-2 pt-0">
						<button type="submit" class="btn btn-warning btn-lg text-light rounded-pill">Kirim</button>
					</div>
				</form>
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
	<!-- <script src="js/scripts.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
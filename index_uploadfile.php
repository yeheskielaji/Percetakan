<?php
session_start();
if (empty($_SESSION['username'])) {
	header("Location:login.php?message=belum_login");
}

$quantity = $_POST['quantity'];
$total_harga = $_POST['total_harga'];
$productid = $_POST['productid'];
$username = $_SESSION['username'];
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
?>

<body style="font-family: 'Montserrat', sans-serif;">

<nav class="navbar fixed-top mx-auto" style="height:60px; background: white;">
        <div class="container-fluid">
        <div class="row gap-5 mx-auto color-primary" style="font-size:18px;">
                <div class="col">
                    <a class="nav-link active" href="index_tambahorder.php?id=<?=$productid?>" style="font-size: 28px;"><i class="bi bi-arrow-left-circle"></i></a>
                </div>
                <div class="col" >
                    <h1 class="fw-semibold">FileUpload</h1>
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
					<form action="orderproses.php" method="post" enctype="multipart/form-data">
						<label for="fileInput" class="card mx-auto w-100 bg-secondary rounded-pills align-items-center">
							<img src="asset/tambah.png" alt="Pilih Gambar" class="card-img-top pt-5 mt-5 pb-5 mb-5" style="width: 40%;">
							<input id="fileInput" type="file" class="visually-hidden" name="file">
							<p class="text-warning pb-5 mb-5">Add file .pdf .cdr .ai</p>
						</label>
				</div>
			</div>
		</div>

		
	</section>
	<!-- bawah -->
	<div class="container fixed-bottom bg-white pb-5 mb-5">
			<div class="row d-flex justify-content-center">
				<div class="col-10 text-center mt-3">
					<div class="d-grid gap-2 pt-0">
						<input type="hidden" name="quantity" value="<?=$quantity?>">
						<input type="hidden" name="total_harga" value="<?=$total_harga?>">
						<input type="hidden" name="username" value="<?=$username?>">
						<input type="hidden" name="productid" value="<?=$productid?>">
						
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
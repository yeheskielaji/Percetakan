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
	<title>Nego Harga </title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script>
		function myFunction() {
			var harga = document.getElementById("harga").value;
			var jumlah = document.getElementById("jml").value;
			var total = harga * jumlah;
			document.getElementById("totalt").innerHTML = numberWithCommas(total);
			document.getElementById("total").value = total;
		}
		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		}
	</script>
</head>

<?php
include('koneksi.php');
$username = $_SESSION['username'];
$productid = $_GET['id'];
$sql   = "SELECT * FROM product WHERE productid='$productid'";

$query    = mysqli_query($connect, $sql);
$jumlah = 0;
$totalharga = 0;
?>

<body style="font-family: 'Montserrat', sans-serif;">
	<form action="uploadfile.php" method="post">

		<section class="vh-100">
			<div class="container pt-5">
				<div class="row d-flex justify-content-center">
					<div class="col-10 text-center">
						<?php
						while ($data = mysqli_fetch_array($query)) {
						?>
							<div class="card mx-auto w-75 shadow p-3 mb-3 bg-body-tertiary rounded">
								<img src="img/<?= $data['foto'] ?>" class="card-img-top" alt="Shopping item">
							</div>
							<?= $data['name']; ?>
							<br>
							<input type="hidden" name="harga" value="<?= $data['price'] ?>" id="harga" oninput="myFunction()">
							<input type="number" oninput="myFunction()" value="1" min="1" class="bg-secondary text-warning p-2 mx-auto w-75 rounded-pill" style=" max-width: 10ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" id="jml" name="quantity"></input>
							<h3 class="text-warning fw-bold mt-3"><span id="totalt"><?= $data['price'] ?></span></h3>
							<input type="hidden" name="total_harga" value="" id="total">
							<input type="hidden" name="productid" value="<?= $data['productid'] ?>">
							<!-- <input type="hidden" name="username" value="<?= $username ?>"> -->
						<?php } ?>

					</div>
				</div>
			</div>

			<!-- bawah -->
			<div class="container fixed-bottom bg-white pb-5 mb-5 mt-3">
				<div class="row d-flex justify-content-center">
					<div class="col-10 text-center">
						<div class="d-grid gap-2 pt-0">
							<button type="submit" class="btn btn-warning btn-lg text-light rounded-pill">Add to Cart</button>
						</div>
	</form>
	</div>
	</div>
	</div>
	</section>

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
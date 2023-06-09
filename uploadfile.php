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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</script>
</head>

<?php
include('koneksi.php');
$username = $_SESSION['username'];
$sql = "SELECT a.keranjangid, a.total_harga, a.productid, a.quantity, a.catatanorder, c.name, c.penjelasan, c.foto, c.price 
		FROM keranjang a INNER JOIN product c 
		ON a.productid=c.productid where a.username='$username';";

$query    = mysqli_query($connect, $sql);
$jumlah = 0;
$totalharga = 0;
?>

<body style="font-family: 'Montserrat', sans-serif;">

	<section class="vh-100">
		<div class="container pt-5">
			<div class="row d-flex justify-content-center">
				<div class="col-10 text-center">
					<form action="" method="post">
						<label for="fileInput" class="card mx-auto w-100 bg-secondary rounded-pills align-items-center">
							<img src="img/tambah.png" alt="Pilih Gambar" class="card-img-top pt-5 mt-5 pb-5 mb-5" style="width: 40%;">
							<input id="fileInput" type="file" class="visually-hidden">
							<p class="text-warning pb-5 mb-5">Add file .pdf .cdr .ai</p>
						</label>
				</div>
			</div>
		</div>

		<!-- bawah -->
		<div class="container fixed-bottom bg-white pb-5">
			<div class="row d-flex justify-content-center">
				<div class="col-10 text-center">
					<!-- <?php
							$query1    = mysqli_query($connect, $sql);
							while ($data1 = mysqli_fetch_array($query1)) {
							?>
							<input type="hidden" name="keranjang[]" value="<?= $data1['keranjangid'] ?>">
							<input type="hidden" name="name[]" value="<?= $data1['name'] ?>">
							<input type="hidden" name="total" value="<?= $totalharga ?>">
							<input type="hidden" name="username" value="<?= $username ?>">
						<?php } ?> -->
					<div class="d-grid gap-2 pt-0">
						<button type="submit" class="btn btn-warning btn-lg text-light rounded-pill">Kirim</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- <script src="js/scripts.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
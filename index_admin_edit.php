<?php
session_start();
if (empty($_SESSION['username'])) {
	header("location:login.php?message=belum_login");
}
if ($_SESSION['level'] != "admin") {
	die("Anda Bukan Admin");
}

$name 		= $_POST['name'];
$price 		= $_POST['price'];
$penjelasan = $_POST['penjelasan'];
$productid	= $_POST['productid'];
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
	<title>Edit Barang</title>
	<link rel="stylesheet" href="style/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<div class="col" style="padding-top: 200px;">
		<form enctype="multipart/form-data" class="form" method="POST" action="index_admin_edit_proses.php">
			<center>
				<table>
					<tr>
						<td>
							<h2 align="center">Edit Barang</h2>
						</td>
					</tr>
				</table>
				<center>
					<div class="align-items-center">
						<div class=" container p-0 text-black">
							<div class="container text-center" style="width:540px; padding-top: 13px;">
								<form action="index_admin_edit_proses" method="post">
									<input type="hidden" name="productid" value="<?=$productid?>">
									<div class="mb-0">
										<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Barang" value="<?= $name ?>">
									</div>
									<br>
									<div class="mb-0">
										<input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Harga Barang" value="<?= $price ?>">
									</div>
									<br>
									<div class="mb-0">
										<input type="text" name="penjelasan" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Deskripsi Barang" value="<?= $penjelasan ?>">
									</div>
									<br>
									<div class="mb-0">
										<input type="file" name="foto" class="form-control" id="exampleFormControlInput1">
									</div>
									<br>
									<div class="container text-center" style="width:541px; padding-top: 20px; padding-bottom: 127px; margin-left: -21px;">
										<div>
											<a href="index_admin.php">
											<button type="button" class="btn btn-primary" style=" background-color: #00A445;">Kembali</button></a>
											<button type="submit" class="btn btn-primary" style=" background-color: #00A445;">Submit</button>
										</div>
									</div>
								</form>

							</div>

						</div>
					</div>
	</div>
	</center>
	</form>
	</center>
	<div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 mt-5 background-primary">
		<div class="text-white mb-3 mb-md-0">
			Copyright © 2022. All rights reserved.
		</div>
	</div>
</body>

</html>
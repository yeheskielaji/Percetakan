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
    <title>Sign up</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <form method="POST" action="register_proses_admin.php">
                <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="asset/medicaltool-icon.png" class="rounded img-fluid" alt="medical device">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <div class="mx-auto d-block pb-3">
                            <h1 class="row justify-content-center fw-bolder color-primary" style="font-size: 50px;">Sign UP</h1>
                        </div>
                        <form>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Username</label>
                                <input type="text" name="username" id="form3Example3" class="form-control form-control-lg" placeholder="Masukkan Username" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Masukkan Password" />
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Telpon</label>
                                <input type="text" name="telp" id="form3Example4" class="form-control form-control-lg" placeholder="Masukkan No Telepon" />
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Alamat</label>
                                <textarea class="form-control" name="alamat" aria-label="With textarea"></textarea>
                            </div>
                            <label class="form-label" for="form3Example4">Level</label>
                            <select class="form-select" name="level" aria-label="Default select example" style="height:50px;">
                                <option selected>Pilih Level</option>
                                <option value="admin" name="admin">Admin</option>
                                <option value="">User</option>
                            </select>
                            <br>

                            <div class="text-center text-lg-start pt-2">
                                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">have an account? <a href="login.php" style="color:blue;">login</a></p>
                            </div>

                        </form>

                    </div>
                </div>
        </div>
        </form>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 mt-5 background-primary">
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2022. All rights reserved.
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
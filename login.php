<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="asset/loginpage.jpg" class="rounded img-fluid" alt="medical device">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="mx-auto d-block pb-5" style="width:60%;">
                        <img src="asset/logo.png" class="rounded img-fluid" alt="medical device">
                    </div>
                    <div class="text-center pb-1 fw-bold" style="color:red;">
                        <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "failed") {
                                echo "login failed! Username atau password salah.";
                            } elseif ($_GET['message'] == "logout") {
                                echo "Anda telah berhasil logout";
                            } elseif ($_GET['message'] == "belum_login") {
                                echo "Anda belum login, masukan username dan password";
                            }
                        }
                        ?>
                    </div>
                    <form method="POST" action="login_proses.php">
                        <!-- Email input -->
                        <div class="form-outline mb-2 mt-2">
                            <input type="text" id="form3Example3" class="form-control form-control-lg" name="username" placeholder="Enter Username" />
                            <label class="form-label" for="form3Example3">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg" name="password" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="text-center text-lg-start pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php" style="color:blue;">Register</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 background-primary">
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2022. All rights reserved.
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
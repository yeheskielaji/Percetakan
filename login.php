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
            <div class="row m-2 mt-5 justify-content-center">
                    <div class="mx-auto pb-5 mb-5 text-center">
                        <h1 style="font-weight: bolder;">MASUK</h1>
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
                        <div class="form-outline mb-4 mt-2">
                            <input type="text" id="form3Example3" class="form-control form-control-lg rounded-pill" name="username" placeholder="Email" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-5 text-center">
                            <input type="password" id="form3Example4" class="mb-3 form-control form-control-lg rounded-pill" name="password" placeholder="Password" />
                            <label for="" style="color:gray;">lupa password?</label>
                        </div>

                        <div class="text-center text-lg-start mt-5" style="padding-top:100px;">
                            <button type="submit" class="btn col-12 btn-lg rounded-pill" style="font-weight: bolder; background-color:#F1C40F; color:white;">Masuk</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0 color-primary"><a href="register.php" style="color:#F1C40F; text-decoration:none;">Belum punya akun?</a></p>
                        </div>
                    </form>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
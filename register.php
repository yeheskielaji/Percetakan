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
    <section class="mx-auto" style="width:390px;">
            <form method="POST" action="register_proses.php" >
            <div class="row m-2 mt-5 justify-content-center">
                    <div class="mx-auto pb-5 mb-5 text-center">
                        <h1 style="font-weight: bolder;">Buat Akun</h1>
                    </div>
                    <form>
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-2"> 
                            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg rounded-pill" placeholder="Email" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg rounded-pill" placeholder="Password" />
                        </div>

                        <div class="form-outline mb-5">
                            <input type="password" name="konfirmasi" id="form3Example4" class="form-control form-control-lg rounded-pill" placeholder="Konfirmasi Password" />
                        </div>

                        <div class="text-center text-lg-start mt-5">
                            <button type="submit" class="btn col-12 btn-lg rounded-pill" style="font-weight: bolder; background-color:#F1C40F; color:white;">Register</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0"><a href="login.php" style="color:#F1C40F; text-decoration:none;">Sudah punya akun?</a></p>
                        </div>
                    </form>
            </div>
    </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
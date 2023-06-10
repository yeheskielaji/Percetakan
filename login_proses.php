<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$login = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['level'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("Location: index_admin.php");
    } else if ($data['level'] == "") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "";
        header("Location: index_login.php");
    } else if ($data['level'] == "desain") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "desain";
        header("Location: index_desainer.php");
    } else {
        header("Location: login.php?message=failed");
    }
} else {
    header("Location: login.php?message=failed");
}
?>
<?php
    $hostname   = "localhost:3306"; //bawaan
    $username   = "percet16_admin"; //bawaan
    $password   = "xg$*d[LS~{E^"; //kosong
    $database   = "percet16_percetakan"; //nama database yang akan dikoneksikan

    $connect    = new mysqli($hostname, $username, $password, $database); //query koneksi

    if($connect->connect_error) { //cek error
        die("Error : ".$connect->connect_error);
    }
?>
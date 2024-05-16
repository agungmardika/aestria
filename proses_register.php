<?php

include_once("function/koneksi.php");
include_once("function/helper.php");

$level          = "customer";
$status         = "on";
$nama           = $_POST['nama'];
$email          = $_POST['email'];
$phone          = $_POST['phone'];
$alamat         = $_POST['alamat'];
$password       = $_POST['password'];
$re_password    = $_POST['re_password'];

unset($_POST['password']);
unset($_POST['re_password']);
$dataForm = http_build_query($_POST);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

if (empty(trim($nama)) || empty(trim($email)) || empty(trim($phone)) || empty(trim($alamat)) ||  empty(trim($password))) {
    header("Location: " . BASE_URL . "index.php?page=register&notif=require&$dataForm");
} elseif ($password != $re_password) {
    header("Location: " . BASE_URL . "index.php?page=register&notif=password&$dataForm");
} elseif (mysqli_num_rows($query) == 1) {
    header("Location:" . BASE_URL . "index.php?page=register&notif=email&$dataForm");
} else {
    $password = md5($password);
    mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                                    VALUES('$level', '$nama', '$email', '$alamat', '$phone', '$password', '$status')");

    header("location:" . BASE_URL . "index.php?page=login&notif=sukses&$dataForm");
}

<?php 
    $server = "localhost";
    $username =  "root";
    $password = "";
    $database = "aestria";
    $port     = "3316";

    $koneksi = mysqli_connect($server, $username, $password, $database, $port) or die("Koneksi ke database gagal");
?>
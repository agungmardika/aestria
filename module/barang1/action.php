<?php
    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");

    $nama_barang = $_POST['nama_barang'];
    $kategori_id = $_POST['kategori_id'];
    $spesifikasi = $_POST['spesifikasi'];
    $status      = $_POST['status'];
    $button      = $_POST['button'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];

    $nama_file = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../image/barang/".$nama_file);

    if($button == "Add")
    {
    mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, gambar, harga, stock, status) 
                            VALUES ('$nama_barang', '$kategori_id', '$spesifikasi', '$nama_file', '$harga', '$stok', '$status')");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");

?>
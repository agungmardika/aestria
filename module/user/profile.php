<?php

include_once("function/koneksi.php");
include_once("function/helper.php");

$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");

while ($row = mysqli_fetch_assoc($queryUser)) {
    echo "
    <div class='w-[70rem]'>
        <div class='flex justify-center'>
            <h2 class='font-bold text-xl'>Profil Saya</h2>
        </div>
        <div class='mt-14 ml-14 text-lg'>
            <p class='mt-2 font-semibold'>Nama Pengguna</p>
            <p class='my-2'>$row[nama]</p><hr>
            <p class='mt-2 font-semibold'>Email</p>
            <p class='my-2'>$row[email]</p><hr>
            
            <p class='mt-2 font-semibold'>Alamat</p>
            <p class='my-2'>$row[alamat]</p><hr>
            <p class='mt-2 font-semibold'>Nomor Telepon</p>
            <p class='my-2'>$row[phone]</p><hr>
            <p class='mt-2 font-semibold'>Password</p>
            <p class='my-2'> *******</p><hr>
        </div>
    </div>
    <div class='mt-5 float-right'>
    
    </div>";
}

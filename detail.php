<!-- <div id="kiri">

    <?php
    $kategori_id = @$_GET['kategori_id'];
    echo kategori($kategori_id);
    ?>

</div> -->



<?php
$barang_id = $_GET['barang_id'];

$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
$row = mysqli_fetch_assoc($query);

echo "
        

<div class='grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32 '>
    <div class='px-11 '>
        <div class='mt-6 space-y-3 rounded-lg border  px-2 py-4 sm:px-6'>
            <img src='" . BASE_URL . "image/barang/$row[gambar]' alt='oo'> 
        </div>
        <div class='ml-[14rem] flex justify-center w-28 h-28 rounded-lg border mt-2'>
            <img class='rounded-lg border mr-2' src='" . BASE_URL . "image/barang/$row[gambar]' alt='oo'> 
            <img class='rounded-lg border mr-2' src='" . BASE_URL . "image/barang/$row[gambar]' alt='oo'> 
            <img class='rounded-lg border mr-2' src='" . BASE_URL . "image/barang/$row[gambar]' alt='oo'> 
            <img class='rounded-lg border' src='" . BASE_URL . "image/barang/$row[gambar]' alt='oo'> 
        </div>
    </div>
    <div class='mt-10 bg-gray-50 px-4 lg:mt-0'><br>
        <p class='text-2xl font-medium'>$row[nama_barang]</p><br>
        <b><p class='text-black-400 text-xl'>" . rupiah($row['harga']) . "</p></b><br>
        <div class=''>
            <i class='fa-sharp fa-solid fa-star mt-3'></i>
            <span class='mt-2 ml-1'>$row[review]</span>
        </div><br>    
        <div class='>
            <p class='text-center mt-4 text-gray-500 mb-2 block text-xs '>Material: LINEN <br><br>

            PERHATIAN: <br>
            • Pembelian di atas 100 ribu akan mendapatkan free sticker pack, 1 pack isi 5 Pcs stiker *selama persediaan masih ada*(tidak berlaku kelipatan & tidak berlaku saat event sale/diskon)<br>
            • Pembelian di bawah 100 ribu tidak akan mendapatkan sticker <br>
            • Pastikan alamat sudah lengkap & No Hp aktif agar memudahkan kurir dalam pengiriman <br>
            • Pengembalian barang atau dana dapat dilakukan sampai dengan 3 hari setelah diterima oleh pembeli dan jika dikarenakan kesalahan dari pihak kami : <br>
            Barang tidak lengkap <br>
            Salah size<br>
            Kecacatan pada produk. <br>
            • Mohon untuk direkam saat membuka paket dari kami untuk menjadi bukti. Mohon maaf kami tidak menerima pengembalian jika kesalahan dari pihak pembeli, seperti salah memilih size atau warna atau tidak ada rekaman saat membuka paket.</p>
            <br>
            <div class='relative'>
            <a href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]' class=''>
                <button class='w-full bg-black text-white font-normal  rounded-lg text-lg px-5 py-2.5  text-center'>
                    Tambahkan ke Keranjang
                </button>
            </a>
            </div><br>
        </div>
    </div>
</div>
        ";
?>